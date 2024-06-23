<?php

namespace App\Http\Controllers;

use App\Models\AKAccount;
use App\Models\AKTransaction;
use App\Models\Mission;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $members = User::all()->count();
        $missions=Mission::all()->count();
        $projects = 0;
        $leaders = User::where("role", "!=", "Member")->orderBy('role','asc')->get();
        $counties = [
            "Mombasa", "Isiolo", "Murang’a", "Laikipia", "Siaya", "Kwale", "Meru",
            "Kiambu", "Nakuru", "Kisumu", "Kilifi", "Tharaka Nithi", "Turkana", "Narok", "Homa Bay",
            "Tana River", "Embu", "West Pokot", "Kajiado", "Migori", "Lamu", "Kitui", "Samburu",
            "Kericho", "Kisii", "Taita Taveta", "Machakos", "Trans Nzoia", "Bomet", "Nyamira",
            "Garissa", "Makueni", "Uasin Gishu", "Kakamega", "Nairobi City", "Wajir", "Nyandarua",
            "Elgeyo/Marakwet", "Vihiga", "Mandera", "Nyeri", "Nandi", "Bung’oma", "Marsabit",
            "Kirinyaga", "Baringo", "Busia"
        ];
        return view("home",compact("members","missions","projects","counties","leaders"));
    }
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
