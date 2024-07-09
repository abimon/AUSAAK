<?php

namespace App\Http\Controllers;

use App\Models\AKReport;
use Illuminate\Support\Str;

class AKReportController extends Controller
{

    public function index()
    {
        $reports = AKReport::all();
        return view('dashboard.repo.index',compact('reports'));
    }
    public function create()
    {
        
    }

    public function store()
    {
        if (request()->file('file')) {
            $extension = request()->file('file')->getClientOriginalExtension();
            $path = Str::slug(Auth()->user()->role, '_') .'_'. date('Y') . '.' . $extension;
            request()->file('file')->storeAs('public/reports/', $path);
        }
        else{
            return back()->withInput()->with('error', 'The report file is required.');
        }
        AKReport::create([
            'user_id' => Auth()->user()->id,
            'department' => request('department'),
            'path' => $path,
            'year' => request('year')
        ]);
        return redirect()->back()->with('success', 'Report saved successfully.');
    }

    public function show($id)
    {
        $report = AKReport::findOrFail($id);
        return view('dashboard.report.show', compact('report'));
    }

    public function edit($id)
    {
        $report = AKReport::findOrFail($id);
        return view('dashboard.report.edit', compact('report'));
    }

    public function update($id)
    {
        AKReport::where('id', $id)->update([
            'path' => request()->path(),
        ]);
        return redirect()->route('report.show')->with('success', 'Report updated successfully.');
    }
    public function destroy($id)
    {
        AKReport::destroy($id);
        return redirect()->route('report.index')->with('success', 'Report delete successfully');
    }
}
