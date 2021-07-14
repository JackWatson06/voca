<?php

namespace App\Actions\WorkerLeads;

use App\Facades\Constant;
use App\Mail\WorkerSignUp;
use App\Models\User;

use Illuminate\Support\Facades\Mail;

class NotifyCreateWorkerLead extends CreateWorkerLead
{
    public function execute()
    {
        $returnData = parent::execute();

        // Hard code Matt, and Jack for emails. This will change shortly.
        $adminUsers = User::where('role_id', Constant::get("roles:ADMIN"))->get();
        foreach($adminUsers as $user)
        {
            Mail::to($user)->queue(new WorkerSignUp($returnData));
        }

        return $returnData;
    }

}