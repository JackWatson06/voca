<?php

namespace App\Validators\Company;

use App\Validators\Validator;

class CreateCompanyValidator extends Validator
{

    protected function rules() : array
    {
        return [
            'name'     => 'required|max:255',
            'industry' => 'required|max:255',
            'size'     => 'nullable|numeric',
            'info'     => 'nullable'
        ];
    }
}