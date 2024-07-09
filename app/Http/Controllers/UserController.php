<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {
        return view("dashboard.user.profile");
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

        return redirect('/dashboard')->with('success','Success');
    }
    public function destroy(User $user)
    {
        //
    }
}
