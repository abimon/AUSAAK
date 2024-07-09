<?php

namespace App\Http\Controllers;

use App\Models\MissionFile;
use Illuminate\Http\Request;

class MissionFileController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    
    public function store()
    {
        foreach(request()->file('photos') as $photo){
            $extension = $photo->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $photo->storeAs('public/mission/photos', $filename); 
            MissionFile::create([
                "mission_id"=>request()->mission_id,
                "path"=>$filename,
                "user_id"=>Auth()->user()->id,
            ]);
        };
        return back()->with("success","Photos uploaded successfully.");
        
    }
    public function show(MissionFile $missionFile)
    {
        
    }

    public function edit(MissionFile $missionFile)
    {
        //
    }

    public function update(Request $request, MissionFile $missionFile)
    {
        //
    }

    public function destroy(MissionFile $missionFile)
    {
        //
    }
}
