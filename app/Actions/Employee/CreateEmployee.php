<?php

namespace App\Actions\Employee;

use App\Actions\Executable;
use App\Validators\Employee\CreateEmployeeValidator;

use App\Models\Employee;

class CreateEmployee implements Executable
{
    
    /**
     * CreatEmployeeValidator so that we can access valid data.
     *
     * @var CreateEmployeeValidator
     */
    private $validator;
    
    /**
     * Construct a action to CreateEmployees if we pass in the correct validator
     *
     * @param  CreatEmployeeValidator $validator
     * @return null
     */
    public function __construct(CreateEmployeeValidator $validator)
    {
        $this->validator = $validator;
    }
    


    /**
     * Create a new employee from the CreateEmployeeValidator
     *
     * @return void
     */
    public function execute()
    {
        $validData = $this->validator->getData();

        $employee = Employee::firstOrCreate( $validData, $validData );

        return $employee;
    }
}