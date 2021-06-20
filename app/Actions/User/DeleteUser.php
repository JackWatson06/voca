<?php

namespace App\Actions\User;

use App\Actions\ResourceExecutable;

class DeleteUser implements ResourceExecutable
{
    
    /**
     * Soft delete the user which matches the id of the resource.
     *
     * @param  int $id
     * @return bool|null
     */
    public function execute(int $id)
    {
        return User::findOrFail($id)->delete();
    }
}