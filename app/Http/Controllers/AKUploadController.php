<?php

namespace App\Http\Controllers;

use App\Models\AKUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AKUploadController extends Controller
{
   
    public function index()
    {
        $files = AKUpload::all();
        return view("dashboard.files.index", compact("files"));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        $i = 1;
        foreach(request()->file('files') as $file){
            if($i<10){
                $k = 0;
            } else {
                $k = '';
            }
            $filepath = $file->getClientOriginalPath();
            $filename =$k.$i.(pathinfo($filepath, PATHINFO_FILENAME)).($file->getClientOriginalExtension());
            return $filename;
            $file->storeAs('public/uploads/', $filename); 
            AKUpload::create([
                "title"=> $file->getClientOriginalName(),
                "user_id"=>Auth()->user()->id,
                "path"=>$filename,
                "category"=>request()->category,
            ]);
            $i++;
        };
        return back()->with("success",($i-1)." Files uploaded successfully.");
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
