<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
       
    }

    public function store()
    {
        try {
            $validateUser = Validator::make(
                request()->all(),
                [
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required',
                    'fname' => 'required|string',
                    'lname' => 'required|string',
                    'contact' => 'required|min:9',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'fname' => request()->fname,
                'lname' => request()->lname,
                'email' => request()->email,
                'contact' => request()->contact,
                'current_residence' => request()->current_residence,
                'avatar' => request()->profile,
                'gender' => request()->gender,
                'chapter' => request()->chapter,
                'grad_year' => request()->grad_year,
                'password' => request()->password,
                'role' => request()->role,
                'inst' => request()->inst,
            ]);

            return response()->json([
                'user' => $user,
                'status' => true,
                'message' => 'User Created Successfully',
                // 'token' => request()->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
