<?php

namespace App\Actions\User;

use App\Models\User;
use App\Actions\ResourceExecutable;

class ReadUser implements ResourceExecutable
{
    
    /**
     * Read the user from the database, and return it's model
     *
     * @param  int $id
     * @return User
     */
    public function execute(int $id)
    {
        return User::findOrFail($id);
    }

}