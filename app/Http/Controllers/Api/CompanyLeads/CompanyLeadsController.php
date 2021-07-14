<?php

namespace App\Http\Controllers\Api\CompanyLeads;

use App\Http\Controllers\Controller;

use App\Actions\CompanyLeads\{ NotifyCreateCompanyLead, ReadCompanyLead, ReadCompanyLeads };


class CompanyLeadsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ReadCompanyLeads $action)
    {
        return $action->execute();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotifyCreateCompanyLead $action)
    {
        return $action->execute();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(int $id, ReadCompanyLead $action)
    {
        return $action->execute($id);
    } 
}
