<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\DataLoader\DataLoaders\HTTPData;
use App\Services\DataLoader\DataLoader;

class DataLoaderServiceProvider extends ServiceProvider
{

    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        DataLoader::class => HTTPData::class,
    ];
    
}
