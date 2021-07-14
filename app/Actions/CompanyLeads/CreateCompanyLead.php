<?php

namespace App\Actions\CompanyLeads;

use App\Actions\Executable;
use App\Actions\Location\CreateLocation;

use App\Models\CompanyLead;

use App\Validators\CompanyLead\CreateCompanyLeadValidator;

class CreateCompanyLead implements Executable
{

    private $validator;

    public function __construct(CreateCompanyLeadValidator $validator)
    {
        $this->validator = $validator;
    }
    
    /**
     * Create a new company lead with the inputed validator. We can honeslty just insert the validator through
     * reflection. See how Fractal does it!
     *
     * @return array
     */
    public function execute()
    {
        $validData = $this->validator->getData();

        // Create the user
        $companyLead = CompanyLead::firstOrCreate(
            ['email' => $validData['email']],
            $validData
        );

        if(isset($validData["location"]))
        {
            $createLocationAction = new CreateLocation($validData["location"]);
            $location = $createLocationAction->execute($companyLead);
        }

        return [
            "company_lead"  => $companyLead,
            "location"      => $location
        ];
    }

}