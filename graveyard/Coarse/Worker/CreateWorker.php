<?php

namespace App\Actions\Coarse\Worker;

use App\Actions\User\CreateUser;
use App\Actions\Document\CreateDocument;

use App\Actions\Coarse\ActionSequence;
use App\Actions\Coarse\Steps\CreateStep;

use App\Actions\Executable;

class CreateWorker implements Executable
{

    private $actionSequence;

    public function __construct(ActionSequence $actionSequence)
    {
        $userStep = new CreateStep("user", CreateUser::class);
        $documentStep = new CreateStep("document", CreateDocument::class);
        $documentStep->dependsOptionally(["user"]);

        $actionSequence->addStep($userStep);
        $actionSequence->addStep($documentStep);

        $this->actionSequence = $actionSequence;
    }

    public function execute()
    {
        return $this->actionSequence->execute();
    }

}