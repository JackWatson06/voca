<?php

namespace App\Services\Crm\ResourceMaps;

use Illuminate\Database\Eloquent\Model;


abstract class CrmResourceAbstract
{

    private $fields;
    private $endpoint;

   
    function __construct(Model $model)
    {
        $resourceName = $model->getTable();
        
        $this->fields = $this->modelMap($model, $resourceName);
        $this->endpoint = $this->endpointMap($resourceName);
        
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }


    abstract protected function modelMap(Model $model, string $resourceName);
    abstract protected function endpointMap(string $resourceName);

}

