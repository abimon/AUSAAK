<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AKAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateUser = Validator::make(
                request()->all(),
                [
                    'trust' => 'required|string',
                    'g_target' => 'required|int',
                    's_target' => 'required|int',
                    'a_target' => 'required|int',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $account = AKAccount::create([
                'name'=>request("name"),
                's_target'=>request("s_target"),
                'a_target'=>request("a_target"),
                'g_target'=>request("g_target"),
                'isOngoing'=>request("isOngoing")
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Account Created Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
