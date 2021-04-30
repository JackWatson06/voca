<?php

namespace App\Validators\User;

use App\Validators\Validator;

class CreateUserValidator extends Validator
{

    protected function postProcessing(array &$data)
    {
        $data['password'] = bcrypt($data['password'] ?? $this->generateRandomPassword(20)); 
    }

    protected function rules() : array
    {
        return [
                'name'     => 'required|max:255',
                'email'    => 'required|max:255',
                'phone'    => 'required|max:50',
                'trade'    => 'nullable|max:255',
                'info'     => 'nullable',
                'role_id'  => 'required|exists:roles,id',
                'password' => 'nullable'
            ];
    }

    private function generateRandomPassword(int $length)
    { 
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_$'), 1, $length);
    }
}