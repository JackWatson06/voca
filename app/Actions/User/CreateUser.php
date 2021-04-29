<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Mail;
use App\Facades\Constant;

use App\Actions\Executable;
use App\Validators\User\CreateUserValidator;

use App\Models\User;
use App\Mail\UserSignUp;

class CreateUser implements Executable
{

    private $validator;

    public function __construct(CreateUserValidator $validator)
    {
        $this->validator = $validator;
    }

    public function execute()
    {
        $validData = $this->validator->getData();

        // Create the user
        $user = User::firstOrCreate(
            ['email' => $validData['email']],
            $validData
        );

        return $user;
    }

}