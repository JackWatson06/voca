<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentUsagesTable extends Migration
{
    public function up()
    {
        Schema::create('document_usages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('document_usages')->insert([
            ['name' => 'RESUME'],
            ['name' => 'PORTRAIT'] // Image of the user
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('document_usages');
    }
}
