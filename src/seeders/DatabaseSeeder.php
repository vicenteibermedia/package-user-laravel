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
    }
}
