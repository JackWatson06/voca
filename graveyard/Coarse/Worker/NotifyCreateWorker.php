<?php

namespace App\Actions\Coarse\Worker;

use App\Models\User;

use App\Mail\WorkerSignUp;

use App\Facades\Constant;

use Illuminate\Support\Facades\Mail;

class NotifyCreateWorker extends CreateWorker
{
    public function execute()
    {
        $returnData = parent::execute();

        // Hard code Matt, and Jack for emails. This will change shortly.
        $adminUsers = User::whereIn('id', ['1', '2'])->get();
        foreach($adminUsers as $user)
        {
            Mail::to($user)->queue(new WorkerSignUp($returnData));
        }

        return $returnData;
    }

}