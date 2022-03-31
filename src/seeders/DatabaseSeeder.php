<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
                ['id' => 1, 'name'=>'ibermedia', 'password' => Hash::make('1b3rm3d14140122'), 'email' => 'aluna@ibermedia.com','activo' => '1'],
        ]);

        DB::table('department_types')->insert([
            ['id' => 1, 'department_name' => 'Recursos Humanos'],
            ['id' => 2, 'department_name' => 'Administracion'],
            ['id' => 3, 'department_name' => 'Desarrollo'],
            ['id' => 4, 'department_name' => 'Servicio Tecnico'],
            ['id' => 5, 'department_name' => 'Atencion al cliente'],
        ]);

        DB::table('user_types')->insert([
            ['id' => 1, 'user_type' => 'Estandar'],
            ['id' => 2, 'user_type' => 'Administrador'],
        ]);
    }
}
