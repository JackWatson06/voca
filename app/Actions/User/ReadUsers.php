<?php

namespace App\Actions\User;

use App\Models\User;

use App\Actions\Executable;

class ReadUsers implements Executable
{
    
    /**
     * Read all the users from the database.
     *
     * @return EloquentCollection
     */
    public function execute()
    {
        return User::all();
    }
}