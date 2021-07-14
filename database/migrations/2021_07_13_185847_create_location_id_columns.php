<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationIdColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Put the location id on the worker leads table.
        Schema::table('worker_leads', function (Blueprint $table) 
        {
            $table->foreignId('location_id')->nullable()->constrained()->onUpdate('restrict')->onDelete('restrict');
        });

        // Put the location id on the company leads table.
        Schema::table('company_leads', function (Blueprint $table) 
        {
            $table->foreignId('location_id')->nullable()->constrained()->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Put the location id on the worker leads table.
        Schema::table('worker_leads', function (Blueprint $table) 
        {
            $table->dropColumn('location_id');
        });

        // Put the location id on the company leads table.
        Schema::table('company_leads', function (Blueprint $table) 
        {
            $table->dropColumn('location_id');
        });
    }
}
