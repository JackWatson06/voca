<?php

namespace App\Http\Controllers\Api\Documents;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Http\Requests\DocumentsRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
     
    // /**
    //  * File Systems
    //  *
    //  * @var FileSystem
    //  */
    // private Filesystem $fileSystem;

    
    // public function __construct(Filesystem $fileSystem)
    // {
    //     $this->fileSystem = $fileSystem;
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentsRequest $request)
    {
        $validated = $request->validated();

        $document = Document::firstOrCreate(
            ['hash_name' => $validated['hash_name']],
            $validated
        );

        $fileContent = $validated['file']->get();
        $encryptedContent = encrypt($fileContent);

        Storage::put($validated['hash_name'] . '.dat', $fileContent);

        return $document;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
