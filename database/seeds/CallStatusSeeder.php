<?php

use Illuminate\Database\Seeder;

use App\Entities\CallStatus\CallStatus;

class CallStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      CallStatus::create([
          'name' => 'Waiting',
          'color' => 'warning',
          'isstart' => '1',
          'isend' => '0'
      ]);
      CallStatus::create([
          'name' => 'Canceled',
          'color' => 'danger',
          'isstart' => '0',
          'isend' => '1'
      ]);
      CallStatus::create([
          'name' => 'In progress',
          'color' => 'info',
          'isstart' => '0',
          'isend' => '0'
      ]);
      CallStatus::create([
          'name' => 'Finalized',
          'color' => 'success',
          'isstart' => '0',
          'isend' => '1'
      ]);
    }
}