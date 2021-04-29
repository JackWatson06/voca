<?php


namespace App\Services\DataLoader\DataLoaders;

use Illuminate\Http\Request;

use App\Services\DataLoader\DataLoader;

class HTTPData implements DataLoader
{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getData(): array
    {
        return $this->request->all();
    }

}