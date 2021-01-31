<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('constant_roles')->insert([
			    ['id' => 0, 'name' => 'ADMIN'],
					['id' => 1, 'name' => 'MANAGER'],
			    ['id' => 2, 'name' => 'EMPLOYEE'],
					['id' => 3, 'name' => 'EMPLOYER']
			]);


      DB::table('constant_apis')->insert([
			    ['id' => 0, 'name' => 'ENGAGEBAY'],
					['id' => 1, 'name' => 'GOOGLECAL']
			]);


      DB::table('constant_resources')->insert([
			    ['id' => 0, 'name' => 'USERS'],
					['id' => 1, 'name' => 'COMPANIES'],
					['id' => 2, 'name' => 'TASKS']
			]);

    }
}
