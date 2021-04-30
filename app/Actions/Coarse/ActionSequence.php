<?php

namespace App\Actions\Coarse;

use Illuminate\Container\Container;

use App\Actions\Executable;
use App\Actions\Coarse\Steps\Step;

use App\Services\DataLoader\DataLoader;

class ActionSequence implements Executable
{

    private $app;

    private $unresolvedSteps;

    private array $resolvedSteps;


    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function execute()
    {
        $dataBindInitialState = $this->app->getBindings()[DataLoader::class]["concrete"];
        $this->resolvedSteps = [];

        foreach($this->unresolvedSteps as $step)
        {
            $this->resolvedSteps[$step->getName()] = $step->resolve($this->app, $this->resolvedSteps);
        }

        $this->app->bind(DataLoader::class, $dataBindInitialState);
    }


    public function addStep(Step $step)
    {
        $this->unresolvedSteps []= $step;
    }  

}
