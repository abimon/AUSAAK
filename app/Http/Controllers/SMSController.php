<?php

namespace App\Http\Controllers;

use App\Models\SMS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = SMS::all();
        return view('dashboard.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = ['SMS','Email'];
        $res = ['All','Leaders','AMO','ALO','Associates','Students'];
        return view('dashboard.message.create',compact('cats','res'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = request('message');
        $m2= str_replace('\r\n'|'\n'|'\r','<br>',$message);
        if(request('recepients')=='ALO'){
            $users = User::where('gender','Female')->get();
        }
        elseif(request('recepients')=='AMO'){
            $users = User::where('gender','Male')->get();
        }
        elseif(request('recepients')=='Students'){
            $users = User::where('grad_year','Yet')->get();
        }
        elseif(request('recepients')=='Associates'){
            $users = User::where('grad_year','!=','Yet')->get();
        }
        elseif(request('recepients')=='Leaders'){
            $users = User::where('role','!=','Member')->get();
        }
        else{
            $users = User::all();
        }
        foreach($users as $user){
            if(request('category')=='SMS'){
                // echo $message;
                $this->sms($message,$user->contact);
            }
            else{
                $this->email($m2,$user,request('subject'));
            }
        }
        SMS::create([
            'message'=>$m2,
            'recepients'=>request('recepients'),
            'type'=>request('category'),
            'subject'=>request('subject'),
            'sender_id'=>Auth()->user()->id
        ]);
        return redirect()->route('message.index')->with('success','Message sent successful.');
    }

    function email($mess,$user,$subject){
        $data = [
            'sender'=>Auth()->user(),
            'mess'=>$mess,
        ];
        Mail::send(
            'mails.messages',
            $data,
            function ($message) use ($user,$subject) {
                $message->to($user->email, $user->fname)->subject($subject);
            }
        );
        return 'Success';
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
    public function show(SMS $sMS)
    {
        //
    }
    public function edit(SMS $sMS)
    {
        //
    }

    public function update(Request $request, SMS $sMS)
    {
        //
    }

    public function destroy(SMS $sMS)
    {
        //
    }
}
