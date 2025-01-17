<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ProdDatabaseSeeder extends Seeder
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
          ['email' => 'm.morgan@americanlaborcompany.com'], 
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
