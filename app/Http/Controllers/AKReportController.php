<?php

namespace App\Http\Controllers;

use App\Models\AKReport;
use Illuminate\Http\Request;

class AKReportController extends Controller
{
    
    public function index()
    {
        $reports=AKReport::orderBy("created_at","desc")->paginate(10);
        return view("dashboard.reports.index",compact("reports"));
    }
    public function create()
    {
        return view("dashboard.report.create");
    }

    public function store()
    {
        $report=AKReport::create([
            'user_id'=>Auth()->user()->id,
            'department'=>Auth()->user()->role,
            'path'=>request()->path(),
        ]);
        return redirect()->route('report.show',$report->id)->with('success','Report saved successfully.');
    }

    public function show($id)
    {
        $report = AKReport::findOrFail($id);
        return view('dashboard.report.show',compact('report'));
    }

    public function edit($id)
    {
        $report = AKReport::findOrFail($id);
        return view('dashboard.report.edit',compact('report'));
    }

    public function update($id)
    {
        AKReport::where('id',$id)->update([
            'path'=>request()->path(),
        ]);
        return redirect()->route('report.show')->with('success','Report updated successfully.');
    }
    public function destroy($id)
    {
        AKReport::destroy($id);
        return redirect()->route('report.index')->with('success','Report delete successfully');
    }
}
