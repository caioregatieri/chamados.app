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
      Departament::insert([
          [
            'name' => 'Secretaria 1',
            'responsable' => 'Responsável 1',
            'created_at' => date('Y-m-d h:i'),
            'updated_at' => date('Y-m-d h:i'),
          ],
          [
            'name' => 'Secretaria 2',
            'responsable' => 'Responsável 2',
            'created_at' => date('Y-m-d h:i'),
            'updated_at' => date('Y-m-d h:i'),
          ]
      ]);
    }
}
