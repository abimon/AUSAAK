<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $items = Inventory::paginate(25);
        return view('dashboard.inventory.index',compact('items'));
    }
    public function create()
    {
        
    }
    public function store()
    {
        $filename='';
        $path='';
        if (request()->file('image')) {
            $extension = request()->file('image')->getClientOriginalExtension();
            $path = time() . '.' . $extension;
            request()->file('image')->storeAs('public/inventory/items', $path); 
        }
        if (request()->file('receipt')) {
            $extension = request()->file('receipt')->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            request()->file('receipt')->storeAs('public/inventory/receipts', $filename); 
        }
        Inventory::create([
            'name' => request('name'),
            'quantity' => request('quantity'),
            'purchase_year' => request('purchase_year'),
            'purchase_price' => request('purchase_price'),
            'condition' => request('condition'),
            'receipt' => $filename,
            'image' => $path,
            'logged_by' => Auth()->user()->id,
        ]);
    }

    public function show(Inventory $inventory)
    {
        //
    }

    public function edit(Inventory $inventory)
    {
        //
    }

    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    public function destroy(Inventory $inventory)
    {
        //
    }
}
