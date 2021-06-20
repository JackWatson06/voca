<?php

namespace App\Services\Crm\ResourceMaps;

use Illuminate\Database\Eloquent\Model;

class EngageBayResource extends CrmResourceAbstract
{

    protected function endpointMap(string $resource)
    {
        return [
            "users" => "dev/api/panel/subscribers/subscriber"
        ][$resource];
    }


    protected function modelMap(Model $model, string $resource)
    {
        return [
            "users" => [
                [
                    "name" => "name",
                    "value" => $model->name,
                    "type" => "SYSTEM"
                ],
                [
                    "name" => "email",
                    "value" => $model->email,
                    "type" => "SYSTEM"
                ],
                [
                    "name" => "phone",
                    "value" => $model->phone,
                    "type" => "SYSTEM"
                ]
            ]
        ][$resource];
    }

} 