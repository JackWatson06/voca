<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;

use App\Actions\Coarse\Employer\NotifyCreateEmployer;


class EmployerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotifyCreateEmployer $action)
    {
        return $action->execute();
    }
    
}
