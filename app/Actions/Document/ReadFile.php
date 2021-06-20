<?php

namespace App\Actions\Document;

use App\Actions\TokenExecutable;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class ReadFile implements TokenExecutable
{    

    /**
     * Take in a token if we use a uuid, or a different string of characters to access the resource.
     *
     * @param  string $token
     * @return array ["documnent" = DocumentModel, "file" = File Data]
     */
    public function execute(string $token)
    {
        $document = Document::where("hash_name", $token)->firstOrFail();

        $fileContent = Storage::disk('local')->get($document->hash_name . '.dat');
        $decryptedFile = decrypt($fileContent);

        return ["document" => $document, "file" => $decryptedFile];
    }
}