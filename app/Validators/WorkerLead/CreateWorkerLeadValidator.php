<?php

namespace App\Validators\Company;

use App\Validators\Validator;

class CreateCompanyValidator extends Validator
{

    /**
     * Rules for creating a worker lead. All inputs must pass these rules before we create the user.
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
                'document'  => new SubValidator("Document\\CreateDocumentValidator"),
        ];
    }

}