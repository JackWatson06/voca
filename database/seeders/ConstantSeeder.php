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

      DB::table('roles')->insert([
			    ['name' => 'EMPLOYEE'],
				  ['name' => 'EMPLOYER']
			]);


      DB::table('apis')->insert([
			    ['name' => 'ENGAGEBAY'],
				  ['name' => 'GOOGLECAL']
			]);


      DB::table('resources')->insert([
			    ['name' => 'USERS'],
				  ['name' => 'COMPANIES'],
				  ['name' => 'EMPLOYEES'],
				  ['name' => 'EMPLOYEE_STATUSES']
			]);

    }
}
