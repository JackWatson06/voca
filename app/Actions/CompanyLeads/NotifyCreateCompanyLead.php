<?php

namespace App\Actions\CompanyLeads;

use App\Facades\Constant;
use App\Mail\EmployerSignUp;
use App\Models\User;

use Illuminate\Support\Facades\Mail;

class NotifyCreateCompanyLead extends CreateCompanyLead
{
    public function execute()
    {
        $returnData = parent::execute();

        // Hard code Matt, and Jack for emails. This will change shortly.
        $adminUsers = User::where('role_id', Constant::get("roles:ADMIN"))->get();
        foreach($adminUsers as $user)
        {
            Mail::to($user)->queue(new EmployerSignUp($returnData));
        }
        
        return $returnData;
    }

}