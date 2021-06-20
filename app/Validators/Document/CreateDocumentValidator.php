<?php

namespace App\Validators\Document;

use App\Validators\Validator;

class CreateDocumentValidator extends Validator
{
    
    /**
     * Rules input validation rules which must pass before we create a new document in the system. The relationship
     * to the model is handled in the action of the create document class.
     *
     * @return array
     */
    protected function rules() : array
    {
        return [
            'hash_name'         => 'required|max:255|unique:documents',
            'document_usage_id' => 'required|exists:document_usages,id',
            'file'              => 'required|mimes:csv,txt,xlx,xls,pdf,docx,doc|max:10240',
        ];
    }


        
    /**
     * Add a random hash name to the document. Their should be very low chance of collision with this method.
     *
     * @param  array $data
     * @return void
     */
    protected function preProcessing(array &$data)
    {
        $data['hash_name'] = md5(uniqid(rand(), true));
    }


    
    /**
     * Create meta-data from the file to store in the database.
     *
     * @param  array $data
     * @return void
     */
    protected function postProcessing(array &$data)
    {
        $file = $data['file'];

        $data['name'] = $file->getClientOriginalName();
        $data['type'] = $file->extension();
    }
}