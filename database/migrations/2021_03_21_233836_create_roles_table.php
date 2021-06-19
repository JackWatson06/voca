<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
			$table->string('name');
        });


        DB::table('roles')->insert([
            ['name' => 'ADMIN'],
            ['name' => 'EMPLOYEE'],
            ['name' => 'EMPLOYER']
        ]);

    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
