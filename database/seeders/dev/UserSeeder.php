<?php

namespace Database\Seeders\Dev;

use Illuminate\Database\Seeder;

use App\Models\User;

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

        User::factory()->count(50)->create();

    }
}
