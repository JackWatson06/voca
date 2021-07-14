<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersFnameAndLnameColumns extends Migration
{
    /**
     * Migrate the current table up so that we can split the fname, and the lname
     *
     * @return void
     */
    public function up()
    {

        // Re-instate the documents table columns
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname', 255)->nullable();
            $table->string('lname', 255)->nullable();
        });
    

        $this->dataUp();

        // Drop old tables, and make the new columns nullable.
        Schema::table('users', function (Blueprint $table) {

            $table->string('fname', 255)->nullable(false)->change();
            $table->string('lname', 255)->nullable(false)->change();

            $table->dropColumn('name');
        });
    }

    /**
     * Split the name into a fname, and a lname.
     *
     * @return void
     */
    private function dataUp()
    {
        // Migrate old user data into the leads tables!
        $users = DB::table("users")->get();

        foreach($users as $user)
        {
            // Explode the name to break into fname, and lname
            $name = explode(" ", $user->name);

            $fname = $name[0];
            $lname = "";
            if(count($name) > 1)
                $lname = $name[1];

            // Soft delete the users.
            DB::table('users')->where('id', $user->id)->update(
                [
                    "fname" => $fname,
                    "lname" => $lname
                ]);
        }
    }

    /**
     * Remove the fname, and lname replace with just the regular name
     *
     * @return void
     */
    public function down()
    {
        // Re-instate the documents table columns
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 255)->nullable();
        });

        $this->dataDown();

        // Drop the morph columns
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 255)->nullable(false)->change();

            $table->dropColumn('fname');
            $table->dropColumn('lname');
        });
    }
    
    /**
     * Combine the fname, and the lname into a single name
     *
     * @return void
     */
    private function dataDown()
    {
        // Migrate old user data into the leads tables!
        $users = DB::table("users")->get();

        foreach($users as $user)
        {
            // Soft delete the users.
            DB::table('users')->where('id', $user->id)->update(
                [
                    "name" => $user->fname . " " . $user->lname,
                ]);
        }
    }
}
