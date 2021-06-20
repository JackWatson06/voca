<?php

namespace App\Http\Controllers\Api\CompanyLeads;

use App\Http\Controllers\Controller;

use App\Actions\CompanyLeads\{ CreateCompanyLead, DeleteCompanyLead, ReadCompanyLead, ReadCompanyLeads, UpdateCompanyLead };


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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, UpdateCompanyLead $action)
    {
        return $action->execute($id);
    }   



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id, DeleteCompanyLead $action)
    {
        return $action->execute($id);
    }   
}
