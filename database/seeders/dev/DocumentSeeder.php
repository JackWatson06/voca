<?php

namespace Database\Seeders\Dev;

use App\Models\Document;

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Document::factory()->count(20)->create();
    }
}
