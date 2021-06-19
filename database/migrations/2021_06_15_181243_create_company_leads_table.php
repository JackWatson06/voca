<?php

use App\Facades\Constant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyLeadsTable extends Migration
{

    
    public function up()
    {
        Schema::create('company_leads', function (Blueprint $table) {
            $table->id();

            $table->string("fname", 255);
            $table->string("lname", 255);
            $table->string("email", 255);
            $table->string("phone", 50);
            $table->string("company_name", 255);
            $table->string("industry", 255);
            $table->integer("size")->nullable();
            $table->text("info")->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        $this->dataUp();
    }



    /**
     * Migrate the data from the companies users, documents, and companies table into the company_leads table
     *
     * @return void
     */
    public function dataUp()
    {
        // Get all the users which are employers
        $users = DB::table("users")->where("role_id", Constant::get("roles:EMPLOYER"))->get();

        foreach($users as $user)
        {
            // Get all the relationship two the companies based on the users selected.
            $employees = DB::table("employees")->where("user_id", $user->id)->get();

            foreach($employees as $employee)
            {
                $company = DB::table("companies")->where("id", $employee->company_id)->first();


                // Explode the name to break into fname, and lname
                $name = explode(" ", $user->name);

                $fname = $name[0];
                $lname = "";
                if(count($name) > 1)
                    $lname = $name[1];


                // Create the new worker lead
                $id = DB::table('company_leads')->insertGetId([
                    "fname"         => $fname,
                    "lname"         => $lname,
                    "email"         => $user->email,
                    "phone"         => $user->phone,
                    "company_name"  => $company->name,
                    "industry"      => $company->industry,
                    "size"          => $company->size,
                    "info"          => $company->info,
                    "created_at"    => $company->created_at,
                    "updated_at"    => $company->updated_at
                ]);

                DB::table('users')->where('id', $user->id)->update(["deleted_at" => now()]);
                DB::table('companies')->where('id', $company->id)->update(["deleted_at" => now()]);
            }
        }
    }



    public function down()
    {
        $this->dataDown();        

        Schema::dropIfExists('company_leads');
    }



    /**
     * Reverse the data migration
     *
     * @return void
     */
    public function dataDown()
    {
        // Get all the worker leads.
        $companyLeads = DB::table('company_leads')->get();

        foreach($companyLeads as $companyLead)
        {
            DB::table('users')->where('email', $companyLead->email)->update(["deleted_at" => null]);
            DB::table('companies')->where('name', $companyLead->company_name)->update(["deleted_at" => null]);
        }
    }
}
