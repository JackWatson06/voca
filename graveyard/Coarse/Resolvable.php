<?php

namespace App\Actions\Coarse;

use Illuminate\Container\Container;

interface Resolvable
{
    public function resolve(Container $app, array $resolvedStack);
}