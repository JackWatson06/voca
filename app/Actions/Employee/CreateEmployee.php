<?php

namespace App\Actions\Employee;

use App\Actions\Executable;
use App\Validators\Employee\CreateEmployeeValidator;

use App\Models\Employee;

class CreateEmployee implements Executable
{

    private $validator;

    public function __construct(CreateEmployeeValidator $validator)
    {
        $this->validator = $validator;
    }

    public function execute()
    {
        $validData = $this->validator->getData();

        $employee = Employee::firstOrCreate( $validData, $validData );

        return $employee;
    }

}