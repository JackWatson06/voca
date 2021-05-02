<?php

namespace App\Actions\Coarse\Employer;

use App\Actions\User\CreateUser;
use App\Actions\Company\CreateCompany;
use App\Actions\Employee\CreateEmployee;

use App\Actions\Coarse\ActionSequence;
use App\Actions\Coarse\Steps\CreateStep;

use App\Actions\Executable;

class CreateEmployer implements Executable
{

    private $actionSequence;

    public function __construct(ActionSequence $actionSequence)
    {
        $userStep = new CreateStep("user", CreateUser::class);
        $companyStep = new CreateStep("company", CreateCompany::class);
        $employeeStep = new CreateStep("employee", CreateEmployee::class);
        $employeeStep->dependsRequired(["user", "company"]);

        $actionSequence->addStep($userStep);
        $actionSequence->addStep($companyStep);
        $actionSequence->addStep($employeeStep);

        $this->actionSequence = $actionSequence;
    }

    public function execute()
    {
        return $this->actionSequence->execute();
    }

}