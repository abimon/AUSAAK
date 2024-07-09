<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AKAccount;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = AKAccount::orderBy("created_at", "desc")->get();
        return response()->json([
            'status' => true,
            'accounts' => $accounts,
            'message' => 'User updated Successfully',
        ], 200);
    }

    public function create()
    {
    }
    public function store()
    {
        AKAccount::create([
            'name' => request("name"),
            's_target' => request("s_target"),
            'a_target' => request("a_target"),
            'g_target' => request("g_target"),
            'isOngoing' => request("isOngoing")
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Account created successfully',
        ], 201);
    }

    public function show($id)
    {
        $account = AKAccount::findOrFail($id);
        return response()->json([
            'status' => true,
            'account' => $account,
            'message' => 'Account created successfully',
        ], 200);
    }
    public function edit()
    {
        //
    }
    public function update($id)
    {
        $account = AKAccount::findOrFail($id);
        if (request("name") != null) {
            $account->name = request("name");
        }
        if (request("s_target") != null) {
            $account->s_target = request("s_target");
        }
        if (request("a_target") != null) {
            $account->a_target = request("a_target");
        }
        if (request("g_target") != null) {
            $account->g_target = request("g_target");
        }
        if (request("isOngoing") ==1) {
            $account->isOngoing = true;
        }
        else{
            $account->isOngoing = false;
        }

        $account->update();
        return response()->json([
            'status' => true,
            'message' => 'Account updated successfully',
        ], 200);
    }
    public function destroy()
    {
    }
}
