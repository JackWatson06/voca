<?php

namespace App\Actions\User;

use App\Models\User;

use App\Actions\Executable;

class ReadUsers implements Executable
{

    public function execute()
    {
        return User::all();
    }

}