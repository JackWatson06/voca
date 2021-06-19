<?php

use App\Facades\Constant;
use App\Models\User;
use App\Models\WorkerLead;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CreateWorkerLeadsTable extends Migration
{


    public function up()
    {

        // Create the worker table
        Schema::create('worker_leads', function (Blueprint $table) {
            $table->id();

            $table->string("fname", 255);
            $table->string("lname", 255);
            $table->string("email", 255);
            $table->string("phone", 50);
            $table->string("trade", 255)->nullable();
            $table->text("info")->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        $this->dataUp();
    }

    

    /**
     * Migrate the previous users inside the users table to the worker leads table.
     *
     * @return void
     */
    private function dataUp()
    {
        // Migrate old user data into the leads tables!
        $users = DB::table("users")->where("role_id", Constant::get("roles:EMPLOYEE"))->get();

        foreach($users as $user)
        {
            // Explode the name to break into fname, and lname
            $name = explode(" ", $user->name);

            $fname = $name[0];
            $lname = "";
            if(count($name) > 1)
                $lname = $name[1];

            // Create the new worker lead
            $id = DB::table('worker_leads')->insertGetId([
                "fname" => $fname,
                "lname" => $lname,
                "email" => $user->email,
                "phone" => $user->phone,
                "trade" => $user->trade,
                "info"  => $user->info,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at
            ]);
            $workerLead = DB::table("worker_leads")->where("id", $id)->first();


            // Get the documents associated with the user.
            // We want to duplicate these documents for the lead.
            $documents = DB::table("documents")
                ->where("documentable_id", $user->id)
                ->where("documentable_type", User::class)
                ->get();

            
            // Duplicate documents for each worker lead.
            foreach($documents as $document)
            {
                $newDocHash = md5(uniqid(rand(), true));

                Storage::copy($document->hash_name . '.dat', $newDocHash . '.dat');

                DB::table('documents')->where('id', $document->id)
                    ->insert([
                        "name"              => $document->name,
                        "hash_name"         => $newDocHash,
                        "type"              => $document->type,
                        "document_usage_id" => $document->document_usage_id,
                        "created_at"        => $document->created_at,
                        "updated_at"        => $document->updated_at,
                        "documentable_id"   => $workerLead->id,
                        "documentable_type" => WorkerLead::class
                    ]);
            }

            // Soft delete the users.
            DB::table('users')->where('id', $user->id)->update(["deleted_at" => now()]);

        }
    }



    public function down()
    {
        $this->dataDown();

        Schema::dropIfExists('worker_leads');
    }


        
    /**
     * Reverse the data migration from above.
     *
     * @return void
     */
    private function dataDown()
    {
        // Get all the worker leads.
        $workerLeads = DB::table('worker_leads')->get();

        foreach($workerLeads as $workerLead)
        {

            // Get the list of documents assoicated with worker lead.
            $documents = DB::table("documents")
                ->where("documentable_id", $workerLead->id)
                ->where("documentable_type", WorkerLead::class)
                ->get();


            // Delete the documents associated with the worker lead.
            foreach($documents as $document)
            {
                Storage::delete($document->hash_name . '.dat');
                DB::table("documents")->delete($document->id);
            }


            // Un Soft delete the users
            DB::table('users')->where('email', $workerLead->email)->update(["deleted_at" => null]);
        }
    }
}
