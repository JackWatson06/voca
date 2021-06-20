<?php

namespace App\Validators\User;

use App\Validators\Validator;
use App\Validators\SubValidator;

class CreateUserValidator extends Validator
{
    
    /**
     * Rules for creating a user. All inputs must pass these rules before we create the user.
     *
     * @return array
     */
    protected function rules() : array
    {
        return [
                'fname'     => 'required|max:255',
                'lname'     => 'required|max:255',
                'email'     => 'required|max:255',
                'phone'     => 'required|max:50',
                'trade'     => 'nullable|max:255',
                'info'      => 'nullable',
                'role_id'   => 'required|exists:roles,id',
                'password'  => 'nullable',
                'document'  => new SubValidator("Document\\CreateDocumentValidator"),
        ];
    }


    
    /**
     * Encrypt the password before we send it back.
     *
     * @param  mixed $data
     * @return void
     */
    protected function postProcessing(array &$data)
    {
        $data['password'] = bcrypt($data['password'] ?? $this->generateRandomPassword(20)); 
    }


        
    /**
     * Generate a random password if we put no password into the system.
     *
     * @param  mixed $length
     * @return void
     */
    private function generateRandomPassword(int $length)
    { 
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_$'), 1, $length);
    }
}