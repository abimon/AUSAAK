<?php

namespace App\Http\Controllers;

use App\Models\AKLeader;
use App\Models\AKRole;
use App\Models\User;
use Illuminate\Http\Request;

class AKLeaderController extends Controller
{
    public function index()
    {
        $leaders = AKLeader::all();

        return view("dashboard.leaders.index", compact("leaders"));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $leader = AKLeader::where([
            ['user_id', request('user_id')],
            ['role_id', request('role')],
            ['from', request('from')],
            ['to', request('to')]
        ])->first();
        if(!$leader){
            $user = User::findOrFail(request('user_id'));
            if($user->role!='Member'){
                AKLeader::where('user_id', $user->id)->take(1)->latest()->update(['to'=> date('Y')]);
            }
            AKLeader::create([
                'user_id' => request('user_id'),
                'role_id' => request('role'),
                'from' => request('from'),
                'to' => request('to'),
            ]);
            $role = AKRole::findOrFail(request('role'));
            if (request('to') == 'Now') {
                User::where('id', request('user_id'))->update([
                    'role' => $role->title,
                ]);
            }
            return back()->with('success', 'Role assigned successfully.');
        }
        return back()->with('error','Leader already serving in the same capacity.');
    }
    public function show(AKLeader $aKLeader)
    {
        //
    }

    public function edit(AKLeader $aKLeader)
    {
        //
    }

    public function update(Request $request, AKLeader $aKLeader)
    {
        //
    }

    public function destroy(AKLeader $aKLeader)
    {
        //
    }
}
