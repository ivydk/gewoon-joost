<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file.index');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'file' => 'required',
        ]);

        $name = $request->file('file')->getClientOriginalName();

        // this line of code will store a file into the file directory
        $path = $request->file('file')->store('public/files');

        $save = new File;

        $save->name = $name;
        $save->path = $path;

//        $service->analyze('file');

        return redirect('upload')->with('status', 'File Has been uploaded successfully in laravel 8');
    }
}
