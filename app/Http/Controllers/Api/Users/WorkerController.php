<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;

use App\Actions\User\CreateUser;
use App\Actions\Document\CreateDocument;


class WorkerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $createUser, CreateDocument $createDocument)
    {

        $createUser = $createUser->execute();
        $createDocument = $createDocument->execute();

        return [ "user" => $createUser, "document" => $createDocument ];

    }
    
}
