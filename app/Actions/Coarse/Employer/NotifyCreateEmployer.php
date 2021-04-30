<?php

namespace App\Actions\Coarse\Employer;

class NotifyCreateEmployer extends CreateEmployer
{
    public function execute()
    {
        $returnData = parent::execute();

        // Send out an email
        

        return $returnData;
    }

}