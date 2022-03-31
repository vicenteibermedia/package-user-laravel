<?php

namespace App\Http\Controllers;
//namespace Danielgarcia\PackageUser;
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
use App\Http\Controllers\Controller;
use App\Models\User;


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
