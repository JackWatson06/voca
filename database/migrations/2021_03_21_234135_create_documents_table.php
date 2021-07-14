<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('company_id')->nullable()->constrained()->onUpdate('restrict')->onDelete('restrict');

            $table->string('name', 255);
            $table->string('hash_name', 255)->unique();
            $table->string('type', 10);
            $table->foreignId('document_usage_id')->constrained()->onUpdate('restrict')->onDelete('restrict');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
