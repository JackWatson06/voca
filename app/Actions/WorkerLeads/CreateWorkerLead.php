<?php

namespace App\Actions\WorkerLeads;

use App\Actions\Executable;
use App\Actions\Document\CreateDocument;
use App\Models\WorkerLead;
use App\Validators\WorkerLead\CreateWorkerLeadValidator;

class CreateWorkerLead implements Executable
{

    private $validator;

    public function __construct(CreateWorkerLeadValidator $validator)
    {
        $this->validator = $validator;
    }

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

        return [
            "worker_lead" => $workerLead, 
            "document" => $document
        ];
    }

}