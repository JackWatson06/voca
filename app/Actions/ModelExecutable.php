<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;

interface ModelExecutable
{

    /**
     * @return Model
     */
    public function execute(Model $model);
}