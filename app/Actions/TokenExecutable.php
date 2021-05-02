<?php

namespace App\Actions;

interface TokenExecutable
{

    /**
     * @return bool
     */
    public function execute(string $token);
}