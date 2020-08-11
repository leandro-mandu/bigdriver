<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' => 'Administrador',
          'email' => 'adm@email.com',
          'password' => Hash::make('senha'),
          'tipo' => 'admin'
        ]);

        DB::table('users')->insert([
          'name' => 'Usuário',
          'email' => 'usuario@email.com',
          'password' => Hash::make('outrasenha')
        ]);
    }
}
