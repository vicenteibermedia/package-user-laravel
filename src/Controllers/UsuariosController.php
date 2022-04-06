<?php

namespace App\Http\Controllers;
// Clases laravel
use View;
use Auth;
use Redirect;
use Hash;
use Validator;
use Log;
use DB;
use SmtpTransport;
use Swift_Mailer;
use Mail;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Departamento;
use App\Models\TipoUsuario;


/**
 *
 */
class UsuariosController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  function __construct()
  {
      //$this->middleware('auth');
  }
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

   public function verUsuarios(){
     $users = User::all();
     return View::make('usuarios.list', compact('users'));
   }

   public function verDepartamentos(){
     $departamentos = Departamento::all();
     return View::make('usuarios.departamentos', compact('departamentos'));
   }

   public function verTiposUsuario(){
     $tiposusuario = TipoUsuario::all();
     return View::make('usuarios.tipos', compact('tiposusuario'));
   }

   public function nuevoUsuario(){
     return View::make('usuarios.new_usuario');
   }
   public function do_NuevoUsuario(Request $request){
     $user = new User;
     if (User::where('email', $request->email)->exists()) {
       return redirect()->route('usuarios.list')->with('error', 'Ya existe un usuario con ese email.');
     }
     $user->name = $request->nombre;
     $user->email = $request->email;
     $user->password = Hash::make($request->password);
     $user->cod = $request->cod;
     $user->role_id = $request->tipos;
     $user->activo = 1;
     $user->save();
     return redirect()->route('usuarios.list')->with('success', 'Usuario creado correctamente');
   }

   public function deleteUsuario(Request $request){
      $user = User::find($request->iduser);
      $user->delete();
      $users = User::all();
      $output['vista_usuarios'] = urlencode(View::make('usuarios.lista_usuarios', compact('users')));
      return json_encode($output);
   }

   public function editarUsuario($id){
     $user = User::find($id);
     return View::make('usuarios.editar_usuario', compact('user'));
   }

   public function do_Edit(Request $request){
     $user_edit = User::find($request->userid);
     $user_edit->name = $request->nombre;
     $user_edit->cod = $request->cod;
     $user_email = User::where('email',$request->email)->first();
     if(isset($user_email)){
       if($user_email->id != $request->userid){
          return redirect()->back()->with('error', '¡Ya existe un usuario con ese email!');
       }
     }
     $user_edit->email = $request->email;
     $user_edit->role_id = $request->tipos;
     $user_edit->save();
     return redirect()->route('usuarios.list')->with('success', '¡Usuario editado correctamente!');
   }

   public function subirImagenUsuario(Request $request){
     $request->validate([
       'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);
     $user = User::find($request->user);
     $extension = $request->image->extension();
     $request->image->move(public_path('assets/img/profile-photos/'), str_replace(' ','',$user->name).'.png');
     $user->ruta_imagen_usuario = 'assets/img/profile-photos/'.str_replace(' ', '', $user->name).'.png';
     $user->save();

     return redirect()->route('usuarios.list');
   }


   public function nuevoDepartamento(){
     return View::make('usuarios.new_departamento');
   }

   public function do_NuevoDepartamento(Request $request){
     $departamento = new Departamento;
     if (Departamento::where('department_name', $request->nombre)->exists()) {
       return redirect()->route('usuarios.departamentos')->with('error', 'Este departamento ya existe');
     }
     $departamento->department_name = $request->nombre;
     $departamento->save();
     return redirect()->route('usuarios.departamentos')->with('success', 'Departamento creado correctamente');
   }

   public function deleteDepartamento(Request $request){
     $departamento = Departamento::find($request->iddepartamento);
     $departamento->delete();
     $departamentos = Departamento::all();
     $output['vista_departamentos'] = urlencode(View::make('usuarios.lista_departamentos', compact('departamentos')));
     return json_encode($output);
   }

   public function editarDepartamento($id){
     $departamento = Departamento::find($id);
     return View::make('usuarios.editar_departamento', compact('departamento'));
   }

   public function do_editarDepartamento(Request $request){
     $departamento_edit = Departamento::find($request->departamentoid);
     $departamento_edit->department_name = $request->nombre;
     $departamento_name = Departamento::where('department_name',$request->nombre)->first();
     if(isset($departamento_name)){
       if($departamento_name->id != $request->departamentoid){
          return redirect()->back()->with('error', '¡Ya existe un departamento con ese nombre!');
       }
     }
     $departamento_edit->save();
     return redirect()->route('usuarios.departamentos')->with('success', '¡Departamento editado correctamente!');
   }


   public function nuevoTipo(){
     return View::make('usuarios.new_tipo');
   }
   public function do_nuevoTipo(Request $request){
     $tipo = new TipoUsuario;
     if (TipoUsuario::where('user_type', $request->nombre)->exists()) {
       return redirect()->route('usuarios.tipos')->with('error', 'Este Tipo de Usuario ya existe');
     }
     $tipo->user_type = $request->nombre;
     $tipo->save();
     return redirect()->route('usuarios.tipos')->with('success', 'Departamento creado correctamente');
   }

   public function deleteTipo(Request $request){
     $tipo = TipoUsuario::find($request->idtipo);
     $tipo->delete();
     $tiposusuario = TipoUsuario::all();
     $output['vista_tipos'] = urlencode(View::make('usuarios.lista_tipos', compact('tiposusuario')));
     return json_encode($output);
   }

   public function editarTipo($id){
     $tipo = TipoUsuario::find($id);
     return View::make('usuarios.editar_tipos', compact('tipo'));
   }

   public function do_editarTipo(Request $request){
      $tipo_edit = TipoUsuario::find($request->tipoid);
      $tipo_edit->user_type = $request->nombre;
      $tipo_name = TipoUsuario::where('user_type',$request->nombre)->first();
      if(isset($tipo_name)){
        if($tipo_name->id != $request->tipoid){
           return redirect()->back()->with('error', '¡Ya existe un tipo con ese nombre!');
        }
      }
      $tipo_edit->save();
      return redirect()->route('usuarios.tipos')->with('success', '¡Tipo de usuario editado correctamente!');
   }



   public function cambiarEstado(Request $request){
          $user = User::find($request->idusuario);
          if($user->activo == 0){
            $user->activo = 1;
          }else{
            $user->activo = 0;
          }
          $user->save();
          $users = User::all();
          $output['activo_cambiado_usuarios'] = urlencode(View::make('usuarios.lista_usuarios',compact('users')));
          return json_encode($output);
   }


}
