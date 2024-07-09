<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Inventory;
use App\Models\User;
class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::all();
        $items = Inventory::select('id', 'name')->get();
        $users = User::select('id', 'fname', 'lname')->get();

        return response()->json([
            'status'=>true,
            'items'=>$items,
            'users'=>$users,
            'borrowings'=>$borrows
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Borrow::create([
            'item_id' => request('item_id'),
            'borrower_name' => request('borrower_name'),
            'borrower_contact' => request('borrower_contact'),
            'ausaa_guarantor' => request('ausaa_guarantor'),
            'borrowing_date' => request('borrowing_date'),
            'return_date' => request('return_date'),
            'details' => request('details'),
            'logged_by' => Auth()->user()->id
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Item lent successfully',
        ], 200);
    }

    public function show(Borrow $borrow)
    {
        //
    }

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
