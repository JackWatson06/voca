<?php

namespace App\Actions\Coarse\Steps;

use Illuminate\Container\Container;

use App\Actions\Coarse\Resolvable;

class Step implements Resolvable
{

    protected $dependentData;

    protected $name;

    protected $actionClass;

    protected $required;

    private $depends;

    public function __construct(string $name, string $actionClass)
    {
        $this->name = $name;
        $this->actionClass = $actionClass;
        $this->depends = [];
    }


    public function resolve(Container $app, array $resolvedStack)
    {
        if($this->isDependent())
            $this->setDependentData($resolvedStack);

    }


    public function dependsOptionally(array $depends)
    {
        $this->depends = $depends;
        $this->required = false;
    }


    public function dependsRequired(array $depends)
    {
        $this->depends = $depends;
        $this->required = true;
    }

    public function getName()
    {
        return $this->name;
    }


    protected function isDependent()
    {
        return count($this->depends) != 0;
    }


    // Right now we only depend on the id of the other action output. This will have to change in the future
    // since we may not depend on just the id maybe its the result of some abstract output.
    private function setDependentData(array $resolvedStack)
    {
        foreach($this->depends as $dependsOn)
        {
            if(!isset($resolvedStack[$dependsOn]))
                throw new \Exception("Dependent step depnds on unresolved step!");

            $this->dependentData[$dependsOn . "_id"]= $resolvedStack[$dependsOn]->id; 
        }
    }


}
