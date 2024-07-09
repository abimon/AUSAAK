<?php

namespace App\Http\Controllers;

use App\Models\AKAccount;
use Illuminate\Http\Request;

class AKAccountController extends Controller
{
    public function index()
    {
        $accounts = AKAccount::orderBy("created_at","desc")->paginate(10);
        return view("dashboard.finance.contribution.index", compact("accounts"));
    }

    public function create()
    {
    }
    public function store(Request $request)
    {
        AKAccount::create([
            'name'=>request("name"),
            's_target'=>request("s_target"),
            'a_target'=>request("a_target"),
            'g_target'=>request("g_target"),
            'isOngoing'=>request("isOngoing")
        ]);
        return back()->with("success","Account created successfully.");
    }

    public function show(AKAccount $aKAccount)
    {
        //
    }
    public function edit(AKAccount $aKAccount)
    {
        //
    }
    public function update($id)
    {
        $account = AKAccount::findOrFail($id);
        if(request("name") != null){
            $account->name=request("name");
        }
        if(request("s_target") != null){
            $account->s_target=request("s_target");
        }
        if(request("a_target") != null){
            $account->a_target=request("a_target");
        }
        if(request("g_target") != null){
            $account->g_target=request("g_target");
        }
        if(request("isOngoing") != null){
            $account->isOngoing=true;
        }
        else{
            $account->isOngoing=false;
        }
        $account->update();
        return back()->with("success","Account updated successful.");
    }
    public function destroy(AKAccount $aKAccount)
    {
        
    }
}
