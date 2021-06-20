<?php

namespace App\Actions\CompanyLeads;

use App\Actions\ResourceExecutable;
use App\Models\CompanyLead;

class ReadCompanyLead implements ResourceExecutable
{

    public function execute(int $id)
    {
        return CompanyLead::where('id', $id)->firstOrFail();
    }
}