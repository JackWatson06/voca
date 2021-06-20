<?php

namespace App\Actions\CompanyLeads;

use App\Actions\Executable;
use App\Models\CompanyLead;
use App\Validators\CompanyLead\CreateCompanyLeadValidator;

class CreateCompanyLead implements Executable
{

    private $validator;

    public function __construct(CreateCompanyLeadValidator $validator)
    {
        $this->validator = $validator;
    }

    public function execute()
    {
        $validData = $this->validator->getData();

        // Create the user
        $companyLead = CompanyLead::firstOrCreate(
            ['email' => $validData['email']],
            $validData
        );

        return $companyLead;
    }

}