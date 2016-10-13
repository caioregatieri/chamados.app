<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Seeder;

use App\Entities\User\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'name' => 'Default User',
          'usertype_id' => '1',
          'place_id' => '1',
          'register' => '1',
          'email' => 'admin@admin',
          'password' => bcrypt('admin'),
          'remember_token' => str_random(10),
          'locked' => '0'
      ]);
    }
}
