<?php

namespace Database\Seeders\Dev;

use App\Models\CompanyLead;
use Illuminate\Database\Seeder;

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
