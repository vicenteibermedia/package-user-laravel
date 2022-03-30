<?php

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/usuarios/list', function(){
  return view('usuarios.list');
});


 ?>
