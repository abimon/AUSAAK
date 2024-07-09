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
            'user_id' => Auth()->user()->id,
            'department' => Auth()->user()->role,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'details' => request('details'),
            'isPublic' => request('isPublic'),
        ]);
        return redirect()->route('report.index')->with('success', 'Report saved successful.');
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('dashboard.reports.show', compact('report'));
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('dashboard.reports.edit', compact('report'));
    }

    public function update($id)
    {
        $report = Report::findOrFail($id);
        if (request('title') != null) {
            $report->title = request('title');
        }
        if (request('details') != null) {
            $report->details = request('details');
        }
        if (request('isPublic') != null) {
            $report->isPublic = request('isPublic');
        }
        $report->update();
        return redirect()->route('report.index')->with('success', 'Report updated successfully.');
    }
    public function destroy($id)
    {
        Report::destroy($id);
        return back()->with('error', 'Report destroyed successfully.');
    }
}
