<?php

namespace App\Validators\Course;

use App\Validators\CourseValidator;

class WorkerValidator extends CourseValidator
{
    protected function validators() : array
    {
        return [
            'user'     => App\Validators\UserValidator::class,
            'document' => App\Validators\EmployeeValidator::class
        ];
    }

    protected function depndent() : array
    {
        return [
            'document' => 'optional|depends_on:user'
        ];
    }
}