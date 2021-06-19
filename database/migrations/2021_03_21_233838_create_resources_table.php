<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
			$table->string('name');
        });

        DB::table('resources')->insert([
            ['name' => 'USERS'],
            ['name' => 'COMPANIES'],
            ['name' => 'EMPLOYEES'],
            ['name' => 'DOCUMENTS']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
