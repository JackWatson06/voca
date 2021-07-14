<?php

namespace Database\Seeders\Dev;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'fname' => "Jack",
                'lname' => "Watson",
                'phone' => "7167718154",
                'trade' => "None",
                'role_id' => 1,
                'password' => bcrypt("JWatson_06")
            ]
        );

        User::firstOrCreate(
            ['email' => 'm.morgan@americanlaborcompany.com'], 
            [
                'fname' => "Mathew",
                'lname' => "Morgan",
                'phone' => "7167718154",
                'trade' => "None",
                'role_id' => 1,
                'password' => bcrypt("MMorgan_07")
            ]
        );

        User::factory()->count(50)->create();

    }
}
