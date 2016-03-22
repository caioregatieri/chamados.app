<?php

use Illuminate\Database\Seeder;

use App\Entities\CallMode\CallMode;

class CallModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      CallMode::create([
          'name' => 'Local'
      ]);
      CallMode::create([
          'name' => 'Remote'
      ]);
    }
}
