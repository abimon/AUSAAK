<?php

namespace App\Http\Controllers;

use App\Models\MissionApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MissionApplicationController extends Controller
{
    public function index()
    {
        $apps = MissionApplication::all();
        return view("dashboard.mission_applications.index", compact("apps"));
    }

    public function create()
    {
        return view("dashboard.mission_applications.step_1");
    }

    public function store(Request $request)
    {
        $mission=MissionApplication::create([
            "name"=>request("name"),
            "email"=>request("email"),
            "contact"=>request("contact"),
            "church"=>request("church"),
            "district"=>request("district"),
            "field"=>request("field"),
            "county"=>request("county"),
            "subcounty"=>request("subcounty"),
            "area"=>request("area")
        ]);
        return view("dashboard.mission_applications.step_2",compact('mission'));

    }
    function sms($message, $phone)
    {

        $data = json_encode(array(
            "api_key" => env('UMS_API_KEY'),
            "email" => env('UMS_EMAIL'),
            "Sender_Id" => env('UMS_SENDER_ID'),
            "message" => $message,
            "phone" => $phone,
        ));
        $response = Http::withBody($data, 'application/json')->withHeaders(['Content-Type : application/json'])->post('https://api.umeskiasoftwares.com/api/v1/sms');
        $result = json_decode($response);
        return $result;
    }

    public function show($id)
    {
        $app = MissionApplication::findOrFail($id);
        if($app->floods==null){
            return view("dashboard.mission_applications.step_3",compact('app'));
        }
        if($app->electricity==null){
            return view("dashboard.mission_applications.step_4",compact('app'));
        }
        if ($app->confirm == false) {
            return view('dashboard.mission_applications.edit', compact('app'));
        }
        return view("dashboard.mission_applications.show",compact("app"));
    }

    public function edit($id)
    {
        $app = MissionApplication::findOrFail($id);
        return view("dashboard.mission_applications.edit",compact("app"));
    }

    public function update($id)
    {
        $app = MissionApplication::findOrFail($id);
        if(request("name")!=null){
            $app->name  = request("name");
        }
        if(request("email")!=null){
            $app->email  = request("email");
        }
        if(request("contact")!=null){
            $app->contact  = request("contact");
        }
        if(request("church")!=null){
            $app->church  = request("church");
        }
        if(request("district")!=null){
            $app->district  = request("district");
        }
        if(request("field")!=null){
            $app->field  = request("field");
        }
        if(request("county")!=null){
            $app->county  = request("county");
        }
        if(request("subcounty")!=null){
            $app->subcounty  = request("subcounty");
        }
        if(request("area")!=null){
            $app->area  = request("area");
        }
        if(request("year")!=null){
            $app->year  = request("year");
        }
        if(request("projects")!=null){
            $app->projects  = request("projects");
        }
        if(request("baptisms")!=null){
            $app->baptisms  = request("baptisms");
        }
        if(request("retentions")!=null){
            $app->retentions  = request("retentions");
        }
        if(request("dominant_church")!=null){
            $app->dominant_church  = request("dominant_church");
        }
        if(request("other_churches")!=null){
            $app->other_churches  = request("other_churches");
        }
        if(request("economic")!=null){
            $app->economic  = request("economic");
        }
        if(request("social")!=null){
            $app->social  = request("social");
        }
        if(request("needs")!=null){
            $app->needs  = request("needs");
        }
        if(request("transport")!=null){
            $app->transport  = request("transport");
        }
        if(request("condition")!=null){
            $app->condition  = request("condition");
        }
        if(request("water")!=null){
            $app->water  = request("water");
        }
        if(request("floods")!=null){
            $app->floods  = request("floods");
        }
        if(request("w_source")!=null){
            $app->w_source  = request("w_source");
        }
        if(request("security")!=null){
            $app->security  = request("security");
        }
        if(request("chief")!=null){
            $app->chief  = request("chief");
        }
        if(request("electricity")!=null){
            $app->electricity  = request("electricity");
        }
        if(request("energy")!=null){
            $app->energy  = request("energy");
        }
        if(request("accommodation")!=null){
            $app->accommodation  = request("accommodation");
        }
        if(request("hostel")!=null){
            $app->hostel  = request("hostel");
        }
        if(request("confirm")!=null){
            $app->confirm  = request("confirm");
        }
        if(request("isPicked")!=null){
            $app->isPicked  = true;
        }
        $app->update();
        
        if($app->floods==null){
            return view("dashboard.mission_applications.step_3",compact('app'));
        }
        if($app->electricity==null){
            return view("dashboard.mission_applications.step_4",compact('app'));
        }
        if ($app->confirm == false) {
            return view('dashboard.mission_applications.edit', compact('app'));
        }
        $this->sms('Hello '.($app->name).'. Thank you for completing your application. We will consider it and give a feedback', (request()->contact));
        $message = (request()->name) . ' of the phone number ' . (request()->contact) . ' has applied for a mission request to '.($app->church).','.($app->subcounty).'. Kindly follow up and respond.';
        $phones = ['0701583807', '0713863384', '0705602329'];
        foreach ($phones as $phone) {
            $this->sms($message, $phone);
        }
        return view('dashboard.mission_applications.show', compact('app'));

    }

    public function destroy($id)
    {
        MissionApplication::destroy($id);
        return redirect()->back()->with("success","Mission application deleted successfully.");
    }
}
