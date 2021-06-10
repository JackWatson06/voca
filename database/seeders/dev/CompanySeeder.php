<?php

namespace Database\Seeders\Dev;

use Illuminate\Database\Seeder;

use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(20)->create();
    }
}
