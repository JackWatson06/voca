<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Mail;
use App\Facades\Constant;

use App\Actions\Executable;
use App\Validators\User\CreateUserValidator;

class CreateWorker implements Executable
{

    private $user;

    public function __construct(CreateWorkerValidator $createWorker)
    {
        $this->user = $user;
    }

    public function execute()
    {

        $user = CreateUser($createWorker->getValidator('user'));

        return $user;
    }

}