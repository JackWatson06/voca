<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\Dev\{UserSeeder, EmployeeSeeder, CompanySeeder};

class DevDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
