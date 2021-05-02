<?php

namespace App\Actions\Document;

use App\Actions\TokenExecutable;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class ReadFile implements TokenExecutable
{
    public function execute(string $token)
    {
        $document = Document::where("hash_name", $token)->firstOrFail();

        $fileContent = Storage::disk('local')->get($document->hash_name . '.dat');
        $decryptedFile = decrypt($fileContent);

        return ["document" => $document, "file" => $decryptedFile];
    }

}