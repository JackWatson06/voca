<?php

namespace App\Validators\Company;

use App\Validators\Validator;

class CreateCompanyValidator extends Validator
{

    protected function rules() : array
    {
        return [
            'fname'        => 'required|max:255',
            'lname'        => 'required|max:255',
            'email'        => 'required|max:255',
            'phone'        => 'required|max:50',
            'company_name' => 'required|max:255',
            'industry'     => 'required|max:255',
            'size'         => 'nullable|numeric',
            'info'         => 'nullable',
        ];
    }
}