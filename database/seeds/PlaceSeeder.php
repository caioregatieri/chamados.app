<?php

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
      Place::create([
          'Departament_id' => '1',
          'name' => 'Default Place',
          'prefix' => '',
          'neighborhood' => 'Centro',
          'address' => 'Exemple Adress',
          'number' => '0001',
          'telephone1' => '01234-5678',
          'telephone2' => '',
          'responsavel' => '',
          'email' => '',
          'lat' => '',
          'lon' => '',
          'region' => 'Center',
          'note' => '',
      ]);
    }
}
