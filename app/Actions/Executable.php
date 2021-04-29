<?php

namespace App\Actions;

interface Executable
{

    /**
     * @return bool
     */
    public function execute();
}