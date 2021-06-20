<?php

namespace App\Http\Controllers\Api\WorkerLeads;

use App\Http\Controllers\Controller;

use App\Actions\WorkerLeads\{ CreateWorkerLead, DeleteWorkerLead, ReadWorkerLead, ReadWorkerLeads, UpdateWorkerLead };


class WorkerLeadsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ReadWorkerLeads $action)
    {
        return $action->execute();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWorkerLead $action)
    {
        return $action->execute();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(int $id, ReadWorkerLead $action)
    {
        return $action->execute($id);
    } 
}
