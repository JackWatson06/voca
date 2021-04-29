<?php

namespace App\Validators\Document;

use App\Validators\Validator;

class CreateDocumentValidator extends Validator
{

    protected function preProcessing(array &$data)
    {
        $data['hash_name'] = md5(uniqid(rand(), true));
    }

    protected function postProcessing(array &$data)
    {
        $file = $data['file'];

        $data['name'] = $file->getClientOriginalName();
        $data['type'] = $file->extension();
    }

    protected function rules() : array
    {
        return [
            'user_id'           => 'required_without:company_id|exists:users,id',
            'company_id'        => 'required_without:user_id|exists:companies,id',
            'hash_name'         => 'required|max:255|unique:documents',
            'document_usage_id' => 'required|exists:document_usages,id',
            'file'              => 'required|mimes:csv,txt,xlx,xls,pdf|max:10240',
        ];
    }

    // protected function getPrefix() : string
    // {
    //     return "document";
    // }

}