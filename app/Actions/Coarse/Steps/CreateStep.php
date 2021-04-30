<?php

namespace App\Actions\Coarse\Steps;

use Illuminate\Container\Container;

use App\Actions\Coarse\Resolvable;

use App\Services\DataLoader\DataLoaders\CoarseHTTPData;
use App\Services\DataLoader\DataLoader;

class CreateStep extends Step implements Resolvable
{

    public function resolve(Container $app, array $resolvedStack)
    {
        parent::resolve($app, $resolvedStack);

        $httpData = $app->makeWith(CoarseHTTPData::class, ['prefix' => $this->name]);

        if($this->skipStep($httpData)) 
        {
            return;
        }
            

        if($this->isDependent())
            $httpData->addData($this->dependentData);

        $app->bind(DataLoader::class, function() use ($httpData) { return $httpData; });

        $action = $app->make($this->actionClass);
        return $action->execute();
    }


    private function skipStep($httpData)
    {
        return !$this->required && $this->isDependent() && $httpData->isEmpty();
    }

}
