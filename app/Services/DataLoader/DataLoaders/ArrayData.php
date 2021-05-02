<?php


namespace App\Services\DataLoader\DataLoaders;

use App\Services\DataLoader\DataLoader;

class ArrayData implements DataLoader
{

    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function getData(): array
    {
        return $this->array;
    }

}