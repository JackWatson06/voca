<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDocumentableColumnsOnDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Create the morph columns
        Schema::table('documents', function (Blueprint $table) {
            $table->unsignedInteger('documentable_id')->nullable();
            $table->string('documentable_type')->nullable();
        });
    

        // Turn the current foreign keys in the documents to use a morphTo relationship in laravel.
        $documents = DB::table('documents')->get();
        foreach($documents as $document)
        {

            // Determine which id to pick for the morph column
            $documentableId = null;
            $documentableType = null;

            if($document->user_id != null)
            {
                $documentableId = $document->user_id;
                $documentableType = "App\User";
            }
            else if($document->company_id != null)
            {
                $documentableId = $document->company_id;
                $documentableType = "App\Company";
            }

            // Update the respective column
            DB::table('documents')->where('id', $document->id)->update(
                [
                    "documentable_id" => $documentableId, 
                    "documentable_type" => $documentableType
                ]
            );
        }

        // Drop old tables, and make the new columns nullable.
        Schema::table('documents', function (Blueprint $table) {

            // Make the columns not nullable.
            $table->unsignedInteger('documentable_id')->nullable(false)->change();
            $table->string('documentable_type')->nullable(false)->change();

            // Remove the user id column
            $table->dropForeign('documents_user_id_foreign');
            $table->dropColumn('user_id');

            // Remove the company id column
            $table->dropForeign('documents_company_id_foreign');
            $table->dropColumn('company_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Re-instate the documents table columns
        Schema::table('documents', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('company_id')->nullable()->constrained()->onUpdate('restrict')->onDelete('restrict');
        });

        // Turn the current foreign keys in the documents to use a morphTo relationship in laravel.
        $documents = DB::table('documents')->get();
        foreach($documents as $document)
        {

            // Get the id, and type accordingly.
            $id = $document->documentable_id;
            $type = $document->documentable_type;

            if($type === "App\User")
            {
                $type = "user_id";
            }
            else if($type === "App\Company")
            {
                $type = "company_id";
            }

            DB::table('documents')->where('id', $document->id)->update(
                [
                    $type => $id
                ]
            );
        }

        // Drop the morph columns
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('documentable_id');
            $table->dropColumn('documentable_type');
        });

    }
}
