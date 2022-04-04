<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::group(array('middleware' => 'auth'), function()
{
  require base_path('routes/usuarios/routes.php');
});*/

Route::get('/', function () {
    return view('layouts.main');
});

/*Route::get('/usuarios/list', function(){
  return view('usuarios.list');
});*/
//Usuarios
Route::get('/usuarios/list', 'App\Http\Controllers\UsuariosController@verUsuarios')->name('usuarios.list');
Route::get('/usuarios/new_usuario', 'App\Http\Controllers\UsuariosController@nuevoUsuario')->name('usuarios.new_usuarior');
Route::post('/usuarios/donuevo', 'App\Http\Controllers\UsuariosController@do_NuevoUsuario')->name('do_new_user');
Route::post('/ajax/usuarios/delete_usuarios', 'App\Http\Controllers\UsuariosController@deleteUsuario')->name('delete_usuario');
Route::get('/usuarios/editar/{id}', 'App\Http\Controllers\UsuariosController@editarUsuario')->name('edit_user');
Route::post('/usuarios/editar/doedit','App\Http\Controllers\UsuariosController@do_Edit' )->name('do_edit_usuario');

//Departamentos
Route::get('/usuarios/departamentos', 'App\Http\Controllers\UsuariosController@verDepartamentos')->name('usuarios.departamentos');
Route::get('/usuarios/new_departamento', 'App\Http\Controllers\UsuariosController@nuevoDepartamento')->name('usuarios.new_departamento');
Route::post('/usuarios/donuevodepartamento', 'App\Http\Controllers\UsuariosController@do_NuevoDepartamento')->name('do_new_departamento');
Route::get('/usuarios/editarDepartamento/{id}', 'App\Http\Controllers\UsuariosController@editarDepartamento')->name('editar_departamento');
Route::post('/usuarios/editar/doeditdepartamento', 'App\Http\Controllers\UsuariosController@do_editarDepartamento')->name('do_editar_departamento');
Route::post('/ajax/usuarios/delete_departamento', 'App\Http\Controllers\UsuariosController@deleteDepartamento')->name('delete_departamento');

//Tipos de Usuario
Route::get('/usuarios/tipos', 'App\Http\Controllers\UsuariosController@verTiposUsuario')->name('usuarios.tipos');
Route::get('/usuarios/new_tipo', 'App\Http\Controllers\UsuariosController@nuevoTipo')->name('usuarios.new_tipo');
Route::post('/usuarios/donuevotipo', 'App\Http\Controllers\UsuariosController@do_nuevoTipo')->name('usuarios.do_new_tipo');
Route::get('/usuarios/editarTipo/{id}', 'App\Http\Controllers\UsuariosController@editarTipo')->name('editar_tipo');
Route::post('/usuarios/editar/doedittipo', 'App\Http\Controllers\UsuariosController@do_editarTipo')->name('do_editar_tipo');
Route::post('/ajax/usuarios/delete_tipo', 'App\Http\Controllers\UsuariosController@deleteTipo')->name('delete_tipo');


Route::post('/ajax/usuarios/cambiar_activo', 'App\Http\Controllers\UsuariosController@cambiarEstado')->name('cambiar_estado');
