<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\Dev\{UserSeeder, EmployeeSeeder, CompanySeeder, DocumentSeeder, WorkerLeadSeeder, CompanyLeadSeeder};

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
            DocumentSeeder::class,
            WorkerLeadSeeder::class,
            CompanyLeadSeeder::class
        ]);
    }
}
