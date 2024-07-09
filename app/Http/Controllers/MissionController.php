<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::orderBy('year','desc')->get();
        return view("dashboard.missions.index", compact("missions"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if(request()->hasFile("cover")){
            $extension = request()->file('cover')->getClientOriginalExtension();
            $cover = time() . '.' . $extension;
            request()->file('cover')->storeAs('public/mission/cover', $cover); 
        }
        else{
            return back()->with('error','Cover image is required.');
        }
        Mission::create([
            'location'=>request('location'),
            'description'=>request('description'),
            'year'=>request('year'),
            'cover'=>request('cover'),
            'isOngoing'=>request('isOngoing'),
            'report'=>request('report')
        ]);
        return redirect()->route('mission.index');
    }

    public function show($id)
    {
        $mission = Mission::findOrFail($id);
        return view('dashboard.missions.show', compact('mission'));
    }

    public function edit($id)
    {
        $mission=Mission::findOrFail($id);
        return view('dashboard.missions.create', compact('mission'));
    }

    public function update($id)
    {
        $mission = Mission::findOrFail($id);
        if(request('location')!=null){
            $mission->location=request('location');
        }
        if(request('county')!=null){
            $mission->county=request('county');
        }
        if(request('description')!=null){
            $mission->description=request('description');
        }
        if(request('year')!=null){
            $mission->year=request('year');
        }
        if(request('cover')!=null){
            $mission->cover=request('cover');
        }
        if(request('isOngoing')!=null){
            $mission->isOngoing=request('isOngoing');
        }
        if(request('isClosed')!=null){
            $mission->isClosed=request('isClosed');
        }
        if(request('report')!=null){
            $mission->report=request('report');
        }
        $mission->update();
        return redirect()->route('mission.show', $mission->id)->with('success', 'Mission detail updated successfully');
    }

    public function destroy(Mission $mission)
    {
        //
    }
}
