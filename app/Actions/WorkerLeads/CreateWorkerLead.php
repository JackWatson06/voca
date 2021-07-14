<?php

namespace App\Actions\WorkerLeads;

use App\Actions\Executable;
use App\Actions\Document\CreateDocument;
use App\Actions\Location\CreateLocation;

use App\Models\WorkerLead;

use App\Validators\WorkerLead\CreateWorkerLeadValidator;

class CreateWorkerLead implements Executable
{

    private $validator;

    public function __construct(CreateWorkerLeadValidator $validator)
    {
        $this->validator = $validator;
    }
    
    /**
     * Create a new worker lead this can be changed to using reflection.
     *
     * @return array
     */
    public function execute()
    {
        $validData = $this->validator->getData();

        // Create the user
        $workerLead = WorkerLead::firstOrCreate(
            ['email' => $validData['email']],
            $validData
        );

        if(isset($validData["document"]))
        {
            $createDocAction = new CreateDocument($validData["document"]);
            $document = $createDocAction->execute($workerLead);
        }

        if(isset($validData["location"]))
        {
            $createLocationAction = new CreateLocation($validData["location"]);
            $location = $createLocationAction->execute($workerLead);
        }

        return [
            "worker_lead" => $workerLead, 
            "document" => $document,
            "location" => $location
        ];
    }

}