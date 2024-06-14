<?php

namespace App\Http\Controllers;

use App\Models\AKUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AKUploadController extends Controller
{
   
    public function index()
    {
        $files = AKUpload::orderBy('title','asc')->get();
        return view("dashboard.files.index", compact("files"));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        $i = 0;
        foreach(request()->file('files') as $file){
            $filepath =(pathinfo($file->getClientOriginalPath(), PATHINFO_FILENAME));
            $filename =(Str::slug($filepath,'_')).'.'.($file->getClientOriginalExtension());
            // return $filename;
            $file->storeAs('public/uploads/', $filename); 
            AKUpload::create([
                "title"=> strtoupper(pathinfo($file->getClientOriginalPath(), PATHINFO_FILENAME)),
                "user_id"=>Auth()->user()->id,
                "path"=>$filename,
                "category"=>request()->category,
            ]);
            $i++;
        };
        return back()->with("success",($i)." Files uploaded successfully.");
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, AKUpload $aKUpload)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
