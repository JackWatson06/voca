<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;

use App\Actions\User\{CreateUser, ReadUser, ReadUsers, UpdateUser, DeleteUser};

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReadUsers $action)
    {
        return $action->execute();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $action)
    {
        return $action->execute();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id, ReadUser $action)
    {
        return $action->execute($id);
    }
    
}
