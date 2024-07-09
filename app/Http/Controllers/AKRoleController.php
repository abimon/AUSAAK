<?php

namespace App\Http\Controllers;

use App\Models\AKRole;
use Illuminate\Http\Request;

class AKRoleController extends Controller
{
    public function index()
    {
        $roles = AKRole::all();
        return view("dashboard.leaders.roles", compact("roles"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        AKRole::create([
            "title"=>request('title'),
            'description'=>request('description'),
        ]);
        return back()->with('success','Role added successfully.');
    }

    public function show(AKRole $aKRole)
    {
        //
    }

    public function edit(AKRole $aKRole)
    {
        //
    }

    public function update(Request $request, AKRole $aKRole)
    {
        //
    }

    public function destroy(AKRole $aKRole)
    {
        //
    }
}
