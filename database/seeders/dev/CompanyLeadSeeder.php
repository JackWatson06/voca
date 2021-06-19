<?php

namespace Database\Seeders\Dev;

use Illuminate\Database\Seeder;

use App\Models\CompanyLead;

class CompanyLeadSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CompanyLead::factory()->count(40)->create();
    }
}
