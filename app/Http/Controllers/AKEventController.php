<?php

namespace App\Http\Controllers;

use App\Models\AKEvent;

class AKEventController extends Controller
{
    public function index()
    {
        $events = AKEvent::all();
        return view('dashboard.events.index',compact('events'));
    }

    public function create()
    {
        return view('dashboard.events.create');
    }

    public function store()
    {
        if (request()->file('cover')) {
            $extension = request()->file('cover')->getClientOriginalExtension();
            $cover = time() . '.' . $extension;
            request()->file('cover')->storeAs('public/cover', $cover); 
        }
        else{
            $cover = 'noimage.jpg';
        }
        $event=AKEvent::create([
            'cover'=> $cover,
            'event_title'=>request('event_title'),
            'user_id'=>Auth()->user()->id,
            'department'=>Auth()->user()->role,
            'event_date'=>request('event_date'),
            'event_time'=>request('from'),
            'event_desc'=>request('event_desc'),
            'permissions'=>'General'
        ]);
        return redirect()->back()->with('success','Event created successful.');
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        $events = AKEvent::findOrFail($id);
        return view('dashboard.events.edit',compact('events'));
    }

    public function update($id)
    {
        $event=AKEvent::findOrFail($id);
        if(request('event_title')!=null){
            $event->event_title=request('event_title');
        }
        if(request('user_id')!=null){
            $event->user_id=request('user_id');
        }
        if(request('event_date')!=null){
            $event->event_date=request('event_date');
        }
        if(request('event_time')!=null){
            $event->event_time=request('event_time');
        }
        if(request('event_duration')!=null){
            $event->event_duration=request('event_duration');
        }
        if(request('event_desc')!=null){
            $event->event_desc=request('event_desc');
        }
        if(request('permissions')!=null){
            $event->permissions=request('permissions');
        }
        if (request()->file('cover')) {
            $extension = request()->file('cover')->getClientOriginalExtension();
            $cover = time() . '.' . $extension;
            request()->file('cover')->storeAs('public/cover', $cover); 
            $event->cover= $cover;
        }
        $event->update();
        return redirect()->route('event.show',$event->id)->with('success','Event updated successful.');
        
    }

    public function destroy($id)
    {
        AKEvent::destroy($id);
        return redirect()->route('event.index')->with('success','Event deleted successfully.');
    }
}
