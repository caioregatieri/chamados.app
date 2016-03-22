<?php

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
      UserType::create([
          'name' => 'Default',
          'administrator' => '1',
          'onlyyourplace' => '0'
      ]);
    }
}
