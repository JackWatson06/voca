<?php

namespace App\Actions\Document;

use App\Actions\Executable;

use App\Models\Document;

class ReadDocuments implements Executable
{
    public function execute()
    {
        return Document::all();
    }

}