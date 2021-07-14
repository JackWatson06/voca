<?php

namespace App\Actions\WorkerLeads;

use App\Actions\Executable;
use App\Models\WorkerLead;

class ReadWorkerLeads implements Executable
{

    public function execute()
    {
        // Filter can at some point be done with filtering service ... maybe just use Largos code
        return WorkerLead::with("documents", "location")->get();
    }
}