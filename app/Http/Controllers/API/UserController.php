<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        Log::channel("test")->info(json_encode(request()->fname));
        User::create([
            'fname'=>request('fname'),
            'mname'=>request('mname'),
            'lname'=>request('lname'),
            'email'=>request('email'),
            'contact'=>request('contact'),
            'current_residence'=>request('current_residence'),
            'profile'=>request('profile'),
            'gender'=>request('gender'),
            'chapter'=>request('chapter'),
            'grad_year'=>request('grad_year'),
            'password'=>request('password'),
            'role'=>request('role'),
            'inst'=>request('inst')
        ]);
        return response()->json(['message'=> 'Success'],200);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
