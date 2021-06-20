<?php

namespace App\Actions\CompanyLeads;

use App\Actions\Executable;
use App\Models\CompanyLead;

class ReadCompanyLeads implements Executable
{

    public function execute()
    {
        // Filter can at some point be done with filtering service ... maybe just use Largos code
        return CompanyLead::all();
    }
}