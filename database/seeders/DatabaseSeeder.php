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
  		User::firstOrCreate(
          [ 'email' => 'j.watson@americanlaborcompany.com'],
          [
              'name' => "Jack Watson",
              'phone' => "7167718154",
              'trade' => "None",
              'role_id' => 1,
              'password' => bcrypt("JWatson_06")
          ]
        );

  		User::firstOrCreate(
          ['email' => 'm.mathew@americanlaborcompany.com'], 
          [
              'name' => "Mathew Morgan",
              'phone' => "7167718154",
              'trade' => "None",
              'role_id' => 1,
              'password' => bcrypt("MMorgan_07")
          ]
      );
    }
}
