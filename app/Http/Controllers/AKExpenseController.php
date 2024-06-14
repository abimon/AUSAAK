<?php

namespace App\Http\Controllers;

use App\Models\AKAccount;
use App\Models\AKExpense;
use Illuminate\Http\Request;

class AKExpenseController extends Controller
{
    public function index()
    {
        $accounts = AKAccount::where("isOngoing", true)->get();
        $expenses = AKExpense::orderBy('created_at','desc')->paginate(50);
        return view("dashboard.finance.expenses.index",compact("expenses","accounts"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        AKExpense::create([
            "account_id"=>request("source"),
            "purpose"=>request("purpose"),
            "treasurer_id"=>Auth()->user()->id,
            "recepient"=>request("recepient"),
            "amount"=>request("amount"),
        ]);
        return back()->with("success","Expense recorded successfully.");
    }

    public function show(AKExpense $aKExpense)
    {
        //
    }

    public function edit(AKExpense $aKExpense)
    {
        //
    }

    public function update(Request $request, AKExpense $aKExpense)
    {
        //
    }

    public function destroy(AKExpense $aKExpense)
    {
        //
    }
}
