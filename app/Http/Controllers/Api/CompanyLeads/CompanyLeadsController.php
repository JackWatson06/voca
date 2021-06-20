<?php

namespace App\Http\Controllers\Api\CompanyLeads;

use App\Http\Controllers\Controller;

use App\Actions\CompanyLeads\{ CreateCompanyLead, ReadCompanyLead, ReadCompanyLeads };


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
    public function store(CreateCompanyLead $action)
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
