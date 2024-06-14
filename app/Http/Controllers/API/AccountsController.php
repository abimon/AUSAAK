<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AKAccount;
use App\Models\AKTransaction;
use App\Models\User;
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
        
        try {
            $validateUser = Validator::make(
                request()->all(),
                [
                    'name' => 'required|string',
                    'g_target' => 'required',
                    's_target' => 'required',
                    'a_target' => 'required',
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
                'account'=>$account,
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateUser = Validator::make(
                request()->all(),
                [
                    'amount' => 'required',
                    'transactionType' => 'required',
                    'receipt' => 'required',
                    'contact' => 'required',
                    'account'=>'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $acc = AKAccount::where('name',request()->account)->first();
            $treasurer = User::where('role', 'Treasurer')->first();
            $user = User::where('contact', request()->contact)->first();
            if(!$user){
                return response()->json(['message'=>'This user is not found'],200);
            }
            else{
                $account = AKTransaction::create([
                    'account_id'=>$acc->id,
                    'amount'=>request()->amount,
                    'user_id'=>$user->id,
                    'type'=>request()->transactionType,
                    'treasurer_id'=>$treasurer->id,
                    'receipt'=>request()->receipt,
                    'created_at'=>request()->created_at,
                    'updated_at'=>request()->updated_at
                ]);
                return response()->json([
                    'account'=>$account,
                    'status' => true,
                    'message' => 'Account Created Successfully',
                ], 200);
            }
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
