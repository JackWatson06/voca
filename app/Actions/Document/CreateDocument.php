<?php

namespace App\Actions\Document;

use App\Actions\Executable;

use App\Facades\Constant;
use Illuminate\Support\Facades\Storage;

use App\Models\Document;

use App\Validators\Document\CreateDocumentValidator;

class CreateDocument implements Executable
{

    private $validator;

    public function __construct(CreateDocumentValidator $validator)
    {
        $this->validator = $validator;
    }

    public function execute()
    {
        $validated = $this->validator->getData();

        $document = Document::firstOrCreate(
            ['hash_name' => $validated['hash_name']],
            $validated
        );

        $fileContent = $validated['file']->get();
        $encryptedContent = encrypt($fileContent);

        Storage::disk('local')->put($validated['hash_name'] . '.dat', $encryptedContent);

        return $document;
    }

}