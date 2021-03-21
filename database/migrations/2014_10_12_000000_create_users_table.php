<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('fname', 255);
            $table->string('lname', 255);
            $table->string('email', 255)->unique();
            $table->string('phone', 50);
            $table->string('trade', 255)->nullable();
            $table->string('password');
            $table->foreignId('role_id')->constrained()->onUpdate('restrict')->onDelete('restrict');


            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
