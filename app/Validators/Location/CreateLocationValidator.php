<?php

namespace App\Validators\Location;

use App\Validators\Validator;

class CreateLocationValidator extends Validator
{

    /**
     * Rules for creating a worker lead. All inputs must pass these rules before we create the user.
     *
     * @return array
     */
    protected function rules() : array
    {
        return [
            'city'  => 'required|max:255',
            'state' => 'required|max:255'
        ];
    }

}