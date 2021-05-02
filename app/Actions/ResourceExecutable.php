<?php

namespace App\Actions;

interface ResourceExecutable
{

    /**
     * @return bool
     */
    public function execute(int $id);
}