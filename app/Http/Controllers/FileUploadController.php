<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{

    public function upload(Request $request)
    {

        $file = $request->file('file')->Store('apiDocs');
        // $file->store('public');

        // return response()->json(['message' => 'File uploaded successfully']);
        return ["result" => $file];
    }
    //
}
