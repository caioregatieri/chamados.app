<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Seeder;

use App\Entities\Place\Place;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Place::insert([
        [
          'Departament_id' => '1',
          'name' => 'Local 1',
          'prefix' => '',
          'neighborhood' => 'Centro',
          'address' => 'General Osório',
          'number' => '1000',
          'telephone1' => '01234-5678',
          'telephone2' => '',
          'responsavel' => '',
          'email' => '',
          'lat' => '',
          'lon' => '',
          'region' => 'Centro',
          'note' => '',
          'created_at' => date('Y-m-d h:i'),
          'updated_at' => date('Y-m-d h:i'),
        ],
        [
          'Departament_id' => '1',
          'name' => 'Local 2',
          'prefix' => '',
          'neighborhood' => 'Santa Cruz',
          'address' => 'Teresa Tortelli Palermo',
          'number' => '3000',
          'telephone1' => '11111-2222',
          'telephone2' => '',
          'responsavel' => '',
          'email' => '',
          'lat' => '',
          'lon' => '',
          'region' => 'Leste',
          'note' => '',
          'created_at' => date('Y-m-d h:i'),
          'updated_at' => date('Y-m-d h:i'),
        ],
        [
          'Departament_id' => '2',
          'name' => 'Local 3',
          'prefix' => '',
          'neighborhood' => 'Jardim do Éden',
          'address' => 'Luiz Vaz de Camões',
          'number' => '702',
          'telephone1' => '22222-1111',
          'telephone2' => '',
          'responsavel' => '',
          'email' => '',
          'lat' => '',
          'lon' => '',
          'region' => 'Center',
          'note' => '',
          'created_at' => date('Y-m-d h:i'),
          'updated_at' => date('Y-m-d h:i'),
        ]
      ]);
    }
}
