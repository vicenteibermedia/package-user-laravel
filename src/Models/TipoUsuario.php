<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class TipoUsuario extends Model
{
  protected $table = 'user_types';
  public $timestamps = true;

  public function nombreTipo(){
    return $this->user_type;
  }

  public function IdTipo(){
    return $this->id;
  }

}



?>
