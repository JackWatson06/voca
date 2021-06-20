<?php

namespace App\Actions\User;

use App\Actions\Executable;
use App\Actions\Document\CreateDocument;
use App\Validators\User\CreateUserValidator;

use App\Models\User;

class CreateUser implements Executable
{
    
    /**
     * The Create User Validator
     *
     * @var CreateUserValidator
     */
    private $validator;
    
    
    /**
     * Create a new user based on the result of the validator
     *
     * @param  CreateUserValidator $validator
     * @return null
     */
    public function __construct(CreateUserValidator $validator)
    {
        $this->validator = $validator;
    }
    


    /**
     * Create a new user. Also create documents if we have that passed in ... want to find a better way to do this.
     *
     * @return void
     */
    public function execute()
    {
        $validData = $this->validator->getData();

        // Create the user
        $user = User::firstOrCreate(
            ['email' => $validData['email']],
            $validData
        );

        if(isset($validData["document"]))
        {
            $createDocAction = new CreateDocument($validData["document"]);
            $createDocAction->execute($user);
        }

        return $user;
    }
}