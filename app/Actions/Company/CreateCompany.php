<?php

namespace App\Actions\Company;

use App\Actions\Executable;
use App\Validators\Company\CreateCompanyValidator;

use App\Models\Company;

class CreateCompany implements Executable
{

    private $validator;

    public function __construct(CreateCompanyValidator $validator)
    {
        $this->validator = $validator;
    }

    public function execute()
    {
        $validData = $this->validator->getData();

        // Create the user
        $company = Company::firstOrCreate(
            ['name' => $validData['name']],
            $validData
        );

        return $company;
    }

}