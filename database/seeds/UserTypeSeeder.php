<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Seeder;

use App\Entities\UserType\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      UserType::insert([
        [
          'name' => 'Administradores',
          'administrator' => '1',
          'onlyyourplace' => '0',
          'created_at' => date('Y-m-d h:i'),
          'updated_at' => date('Y-m-d h:i'),
        ],
        [
          'name' => 'Limitados',
          'administrator' => '0',
          'onlyyourplace' => '1',
          'created_at' => date('Y-m-d h:i'),
          'updated_at' => date('Y-m-d h:i'),
        ]
      ]);
    }
}
