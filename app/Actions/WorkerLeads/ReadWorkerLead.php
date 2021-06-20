<?php

namespace App\Actions\WorkerLeads;

use App\Actions\ResourceExecutable;
use App\Models\WorkerLead;

class ReadWorkerLead implements ResourceExecutable
{

    public function execute(int $id)
    {
        return WorkerLead::where('id', $id)->firstOrFail();
    }
}