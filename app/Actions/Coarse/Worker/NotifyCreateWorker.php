<?php

namespace App\Actions\Coarse\Worker;

class NotifyCreateWorker extends CreateWorker
{
    public function execute()
    {
        $returnData = parent::execute();

        // Send out an email

        return $returnData;
    }

}