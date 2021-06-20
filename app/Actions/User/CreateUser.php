<?php

namespace App\Actions\User;

use App\Actions\Executable;
use App\Validators\User\CreateUserValidator;

use App\Models\User;

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

        dd($validData);

        // Create the user
        $user = User::firstOrCreate(
            ['email' => $validData['email']],
            $validData
        );

        return $user;
    }

}