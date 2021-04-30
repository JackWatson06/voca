<?php

namespace App\Http\Controllers\Api\Companies;

use App\Http\Controllers\Controller;

use App\Actions\User\{CreateCompany};

class CompaniesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(ReadCompanies $action)
    // {
    //     return $action->execute();
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompany $action)
    {
        return $action->execute();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(int $id, ReadCompany $action)
    // {
    //     return $action->execute($id);
    // }

}
