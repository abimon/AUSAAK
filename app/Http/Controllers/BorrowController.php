<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::paginate(25);
        $items = Inventory::select('id','name')->get();
        $users = User::select('id', 'fname', 'lname')->get();
        return view('dashboard.borrow.index',compact('items','users','borrows'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Borrow::create([
            'item_id'=>request('item_id'),
            'borrower_name'=>request('borrower_name'),
            'borrower_contact'=>request('borrower_contact'),
            'ausaa_guarantor'=>request('ausaa_guarantor'),
            'borrowing_date'=>request('borrowing_date'),
            'return_date'=>request('return_date'),
            'details'=>request('details'),
            'logged_by'=>Auth()->user()->id
        ]);
        return back()->with('success','Borrowing in processing.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
