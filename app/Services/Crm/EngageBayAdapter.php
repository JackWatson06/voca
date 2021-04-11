<?php

namespace App\Services\Crm;

use Illuminate\Database\Eloquent\Model;
use App\Services\Crm\ResourceMaps\EngageBayResource;

use GuzzleHttp\Client;

class EngageBayAdapter implements CrmAdapterContract
{

    private $apiToken;


    public function __contructor(String $apiToken)
    {
        $this->apiToken = $apiToken;
    }

    public function getDomain()
    {
        return "https://app.engagebay.com/";
    }


    public function updateResource(Model $model)
    {

    }

    public function createResource(Model $model)
    {
        $crmResource = new EngageBayResource($model);


        $this->apiToken = "6brb4rv1vto4r4den8oath5l11";

        $postData = [
            "score"      => 10,
            "properties" => $crmResource->getFields()
        ];

        $client = new Client();
        $res = $client->post($this->getDomain() . $crmResource->getEndpoint(), 
            [
                'headers' =>  
                    [ 
                      'Accept'        => 'application/json',
                      'Content-Type'  => 'application/json',
                      'Authorization' => $this->apiToken
                    ],
                'json' => $postData
            ]);
    }

    public function downloadResource()
    {

        
    }

}


