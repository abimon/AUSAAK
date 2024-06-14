<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AKAccount;
use App\Models\AKExpense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ExpenseController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $validateUser = Validator::make(
                request()->all(),
                [
                    'purpose' => 'required',
                    'account' => 'required',
                    'recepient' => 'required',
                    'loggedBy' => 'required',
                    'amount' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $name = explode(' ',request('loggedBy'),3);
            $acc = AKAccount::where('name', request('account'))->first();
            $treasurer = User::where('fname', $name[0])->first();
            $expense = AKExpense::create([
                "account_id" => $acc->id,
                "purpose" => request("purpose"),
                "treasurer_id" => $treasurer->id,
                "recepient" => request("recepient"),
                "amount" => request("amount"),
            ]);
            return response()->json([
                'account' => $expense,
                'status' => true,
                'message' => 'Expense registered Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        //
    }

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
