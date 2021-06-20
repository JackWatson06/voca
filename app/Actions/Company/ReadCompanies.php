<?php

namespace App\Actions\Company;

use App\Models\Company;

use App\Actions\Executable;

class ReadCompanies implements Executable
{
    
    /**
     * Read all the companies from the database.
     *
     * @return EloquentCollection
     */
    public function execute()
    {
        return Company::all();
    }
}