<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
  		User::firstOrCreate(
          ['email' => 'j.watson@americanlaborcompany.com'], [
              'name' => "jack",
              'password' => bcrypt("JWatson_06"),
          ]
      );

  		User::firstOrCreate(
          ['email' => 'm.mathew@americanlaborcompany.com'], [
              'name' => "matt",
              'password' => bcrypt("MMorgan_07"),
          ]
      );
    }
}
