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
      User::insert([
        [
          'name' => 'Administrador',
          'usertype_id' => '1',
          'place_id' => '1',
          'register' => '1',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin'),
          'remember_token' => str_random(10),
          'locked' => '0',
          'created_at' => date('Y-m-d h:i'),
          'updated_at' => date('Y-m-d h:i')
        ],
        [
          'name' => 'Limitado',
          'usertype_id' => '2',
          'place_id' => '2',
          'register' => '2',
          'email' => 'limitado@email.com',
          'password' => bcrypt('limitado'),
          'remember_token' => str_random(10),
          'locked' => '0',
          'created_at' => date('Y-m-d h:i'),
          'updated_at' => date('Y-m-d h:i')
        ]
      ]);
    }
}
