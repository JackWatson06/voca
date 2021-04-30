<?php

namespace App\Actions\Coarse\Employer;

use App\Validators\Worker\CreateWorkerValidator;
use App\Actions\Executable;

class CreateEmployer implements Executable
{

    private $validator;

    public function __construct(CourseAction $courseAction)
    {

        $courseAction->independent("user", UserCreate::class);
        $courseAction->dependent("document", DocumentCreate::class);

        $this->courseAction = $courseAction;
    }

    public function execute()
    {

        $user = new CreateUser($createWorker->getValidator('user'));

        return $user;
    }

}