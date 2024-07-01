<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy("created_at", "desc")->paginate(10);
        return view("dashboard.reports.index", compact("reports"));
    }
    public function create()
    {
        return view('dashboard.reports.create');
    }

    public function store()
    {
        Report::create([
            'user_id'=>Auth()->user()->id,
            'department'=>Auth()->user()->role,
            'title'=>request('title'),
            'slug'=>Str::slug(request('title')),
            'details'=>request('details'),
            'isPublic'=>request('isPublic'),
        ]);
        return redirect()->route('report.index')->with('success','Report saved successful.');
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('dashboard.report.show', compact('report'));
    }

    public function edit(Report $report)
    {
        //
    }

    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
