<?php

namespace App\Http\Controllers\Api\Documents;

use App\Http\Controllers\Controller;

use App\Actions\Document\{ ReadFile };

class FileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ReadFile $action)
    {
        $fileInformation = $action->execute($id);

        $fileName = $fileInformation["document"]->name;
        $fileType = \GuzzleHttp\Psr7\mimetype_from_filename($fileName);

        $headers = [
            'Content-type'        => $fileType,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];
    
        return \Response::make($fileInformation["file"], 200, $headers);
    }
}
