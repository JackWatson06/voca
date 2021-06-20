<?php

namespace App\Http\Controllers\Api\Employees;

use App\Http\Controllers\Controller;

use App\Actions\Employee\{ CreateEmployee };

class EmployeesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployee $action)
    {
        return $action->execute();
    }
}
