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
        $adminUsers = User::whereIn('id', ['1', '2'])->get();
        foreach($adminUsers as $user)
        {
            Mail::to($user)->queue(new EmployerSignUp($returnData));
        }
        
        return $returnData;
    }

}