<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/usuarios/list', 'App\Http\Controllers\UsuariosController@verUsuarios')->name('usuarios.list');
Route::post('/ajax/usuarios/cambiar_activo', 'App\Http\Controllers\UsuariosController@cambiarEstado')->name('cambiar_estado');
 ?>
