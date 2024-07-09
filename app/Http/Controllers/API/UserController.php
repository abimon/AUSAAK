<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'user' => User::all(),
            'status' => true,
        ], 200);
    }

    public function create()
    {
        try {
            $validateUser = Validator::make(request()->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt(request()->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', request()->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function store()
    {
        try {
            $validateUser = Validator::make(
                request()->all(),
                [
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required',
                    'f_name' => 'required|string',
                    'l_name' => 'required|string',
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
                'f_name'=>request('f_name'),
                'm_name'=>request('m_name'),
                'l_name'=>request('l_name'),
                'contact'=>request('contact'),
                'gender'=>request('gender'),
                'email'=>request('email'),
                'password'=>request('password'),
            ]);

            return response()->json([
                'user' => $user,
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => request()->createToken("API TOKEN")->plainTextToken
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
        return response()->json([
            'user' => User::findOrFail($id),
            'status' => true,
        ], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        if (request()->file('avatar')) {
            $extension = request()->file('avatar')->getClientOriginalExtension();
            $filename = request()->l_name;
            $avatar = $filename . time() . '.' . $extension;
            request()->file('avatar')->storeAs('public/avatar', $avatar);
            $user->avatar = $avatar;
        }
        if (request()->has('fname')) {
            $user->fname = request()->f_name;
        }
        if (request()->has('lname')) {
            $user->lname = request()->l_name;
        }
        if (request()->has('email')) {
            $user->email = request()->email;
        }
        if (request()->has('contact')) {
            $code = request()->code;
            $originalStr = request()->contact;
            $prefix = substr($originalStr, 0, 1);
            $contact = str_replace('0', $code, $prefix) . substr($originalStr, 1);
            $user->contact = $contact;
        }
        if (request()->has('gender')) {
            $user->gender = request()->gender;
        }
        if (request()->has('current_residence')) {
            $user->current_residence = request()->current_residence;
        }
        if (request()->has('chapter')) {
            $user->chapter = request()->chapter;
        }
        if (request()->has('inst')) {
            $user->inst = request()->inst;
        }
        if (request()->has('grad_year')) {
            $user->grad_year = request()->grad_year;
        }
        if (request()->has('password') && Hash::check(request()->oldpassword, $user->password)) {
            $user->password = Hash::make(request()->password);
        }
        if (request()->has('role')) {
            $user->role = request()->role;
        }
        $user->update();
        return response()->json([
            'status' => true,
            'message' => 'User updated Successfully',
        ], 200);
    }

    public function destroy($id)
    {
        //
    }
}
