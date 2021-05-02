<?php

namespace App\Validators\Employee;

use App\Validators\Validator;

class CreateEmployeeValidator extends Validator
{

    protected function rules() : array
    {
        return [
            'user_id'     => 'required|exists:users,id',
            'company_id'    => 'required|exists:companies,id'
        ];
    }
}