<?php

namespace App\Actions\Company;

use App\Models\Company;
use App\Actions\ResourceExecutable;

class ReadCompany implements ResourceExecutable
{
    
    /**
     * Read the companies from the database, and return it's model
     *
     * @param  int $id
     * @return Company
     */
    public function execute(int $id)
    {
        return Company::findOrFail($id);
    }

}