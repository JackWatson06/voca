<?php

namespace App\Services\DataLoader;

use Illuminate\Database\Eloquent\Model;

interface DataLoader
{

    public function getData(): array;

}