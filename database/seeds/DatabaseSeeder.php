<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Model::unguard();
      //para mysql deixar ativado
      //DB::statement("SET foreign_key_checks = 0");

      $this->call(CallModeSeeder::class);
      $this->call(CallStatusSeeder::class);
      $this->call(DepartamentSeeder::class);
      $this->call(PlaceSeeder::class);
      $this->call(UserTypeSeeder::class);
      $this->call(UserSeeder::class);

      //para mysql deixar ativado
      //DB::statement("SET foreign_key_checks = 1");
      Model::reguard();
    }
}
