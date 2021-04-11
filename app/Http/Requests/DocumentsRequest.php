<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'hash_name' => md5(uniqid(rand(), true))
        ]);
    }

    public function validated()
    {
        $file = parent::validated()['file'];

        $fileName = $file->getClientOriginalName();
        $fileExtensionName = $file->extension();

        return array_merge(parent::validated(), [
            'name' => $fileName,
            'type' => $fileExtensionName,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required_without:company_id|exists:users,id',
            'company_id' => 'required_without:user_id|exists:companies,id',
            'hash_name' => 'required|max:255|unique:documents',
            'document_usage_id'  => 'required|exists:document_usages,id',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:10240',
        ];
    }
}
