<?php

namespace App\Services\Crm;

use Illuminate\Database\Eloquent\Model;

interface CrmAdapterContract
{

    public function getDomain();

    public function updateResource(Model $model);

    public function createResource(Model $model);

    public function downloadResource();

}