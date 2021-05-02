<?php

namespace App\Actions\Coarse\Employer;

use App\Models\User;

use App\Mail\EmployerSignUp;

use App\Facades\Constant;

use Illuminate\Support\Facades\Mail;

class NotifyCreateEmployer extends CreateEmployer
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