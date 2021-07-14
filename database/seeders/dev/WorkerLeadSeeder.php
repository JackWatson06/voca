<?php

namespace Database\Seeders\Dev;

use App\Models\WorkerLead;
use Illuminate\Database\Seeder;

class WorkerLeadSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        WorkerLead::factory()->count(50)->create();
    }
}
