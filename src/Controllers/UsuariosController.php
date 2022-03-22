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
     return View::make('usuarios.list');
   }

}
