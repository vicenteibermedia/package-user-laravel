<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //Table with user types
      Schema::create('user_types', function (Blueprint $table){
        $table->increments('id');
        $table->String('user_type');
        $table->timestamps();
      });

      //Table with different departments.
      Schema::create('department_types', function (Blueprint $table){
        $table->increments('id');
        $table->String('department_name');
        $table->timestamps();

      });

      //Users table
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('cod')->unique()->nullable();
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->integer('activo')->defeault('0');
          $table->string('ruta_imagen_usuario')->nullable();
          $table->rememberToken();
          $table->timestamps();

          $table->integer('role_id')->unsigned()->nullable();
          $table->foreign('role_id')->references('id')->on('user_types')->onDelete('set null');

          $table->integer('department_id')->unsigned()->nullable();
          $table->foreign('department_id')->references('id')->on('department_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
