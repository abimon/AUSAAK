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
            $exension =$file->getClientOriginalExtension();
            $filename =strtoupper(mb_substr(request()->category,0,3)).$k. $i.'.'.$exension;
            $file->storeAs('public/uploads/'.strtoupper(mb_substr(request()->category,0,5)), $filename); 
            AKUpload::create([
                "title"=> $filename,
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
