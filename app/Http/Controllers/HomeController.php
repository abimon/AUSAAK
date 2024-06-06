<?php

namespace App\Http\Controllers;

use App\Models\AKAccount;
use App\Models\AKTransaction;

class HomeController extends Controller
{
    public function dashboard()
    {
        $account = AKAccount::where('isOngoing', true)->orderBy('created_at', 'desc')->first();
        if (!$account) {
            $total = 0;
            $last = null;
        } else {
            $total = AKTransaction::where('account_id', $account->id)->sum('amount');
            $last = AKTransaction::where('account_id', $account->id)->orderBy('created_at', 'desc')->first();
        }
        return view("dashboard.index", compact("account", "total", "last"));
    }
}
