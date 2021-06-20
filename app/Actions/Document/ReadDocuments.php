<?php

namespace App\Actions\Document;

use App\Actions\Executable;

use App\Models\Document;

class ReadDocuments implements Executable
{    

    /**
     * Load every single document in the system.
     *
     * @return void
     */
    public function execute()
    {
        return Document::all();
    }
}