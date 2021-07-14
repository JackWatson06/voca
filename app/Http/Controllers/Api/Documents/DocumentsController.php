<?php

namespace App\Http\Controllers\Api\Documents;

use App\Http\Controllers\Controller;

use App\Actions\Document\{CreateDocument, ReadDocuments};


class DocumentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReadDocuments $action)
    {
        return $action->execute();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDocument $action)
    {
        return $action->execute();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Document::findOrFail($id);
    }
}
