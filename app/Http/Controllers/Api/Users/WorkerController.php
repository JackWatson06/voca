<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;

use App\Actions\Coarse\Worker\NotifyCreateWorker;


class WorkerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotifyCreateWorker $action)
    {
        return $action->execute();
    }
    
}
