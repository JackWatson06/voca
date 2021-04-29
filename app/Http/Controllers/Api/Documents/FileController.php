<?php

namespace App\Http\Controllers\Api\Documents;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Http\Requests\DocumentsRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::where("hash_name", $id)->firstOrFail();

        $fileContent = Storage::disk('local')->get($document->hash_name . '.dat');
        $decryptedFile = decrypt($fileContent);

        return $decryptedFile;
    }


}
