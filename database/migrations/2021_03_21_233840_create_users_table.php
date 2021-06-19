<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('phone', 50);
            $table->string('trade', 255)->nullable();
            $table->text('info')->nullable();
            $table->foreignId('role_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->string('password');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
