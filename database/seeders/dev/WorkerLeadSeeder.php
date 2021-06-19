<?php

namespace Database\Seeders\Dev;

use Illuminate\Database\Seeder;

use App\Models\WorkerLead;

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
