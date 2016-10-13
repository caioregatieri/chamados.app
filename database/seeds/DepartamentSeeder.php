<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Seeder;

use App\Entities\Departament\Departament;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Departament::create([
          'name' => 'Default'
      ]);
    }
}
