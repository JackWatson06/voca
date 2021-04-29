<?php

namespace App\Actions\User;

use App\Actions\ResourceExecutable;

class DeleteUser implements ResourceExecutable
{

    public function execute(int $id)
    {
        return User::findOrFail($id)->delete();
    }

}