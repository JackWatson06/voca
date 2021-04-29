<?php

namespace App\Validators\Course;

use App\Validators\CourseValidator;

class EmployerValidator extends CourseValidator
{
    protected function validators() : array
    {
        return [
            'user'     => App\Validators\UserValidator::class,
            'company'  => App\Validators\CompanyValidator::class,
            'employee' => App\Validators\EmployeeValidator::class
        ];
    }

    protected function depndent() : array
    {
        return [
            'employee' => 'required|depends_on:user,company'
        ];
    }
}