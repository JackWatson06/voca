<?php

namespace App\Actions\User;

use App\Models\User;

use App\Actions\ResourceExecutable;

class ReadUser implements ResourceExecutable
{

    public function execute(int $id)
    {
        return User::findOrFail($id);
    }

}