<?php

namespace App\Http\Controllers;

use App\Models\AKChat;
use App\Models\User;
use Illuminate\Http\Request;

class AKChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth()->user()->id)->get();
        $message = AKChat::where('recepient_id', Auth()->user()->id)->orderBy('created_at', 'desc')->first();
        if ($message) {
            $sender = $message->sender;
            $messages = AKChat::where([['recepient_id', Auth()->user()->id], ['sender_id', $sender->id]])->orWhere([['sender_id', Auth()->user()->id], ['recepient_id', $sender->id]])->get();
            foreach ($messages as $message) {
                $message->isRead = true;
                $message->update();
            }
        } else {
            $sender  = null;
            $messages = AKChat::where([['recepient_id', Auth()->user()->id], ['sender_id', 0]])->orWhere([['sender_id', Auth()->user()->id], ['recepient_id', 0]])->get();
        }

        $chats = [];
        foreach ($users as $user) {
            $chat = AKChat::where('recepient_id', $user->id)->orWhere('sender_id', $user->id)->orderBy('created_at', 'desc')->first();
            if ($chat != null) {
                array_push($chats, ['message' => $chat->message, 'user_id' => $user->id]);
            }
        }
        return view('dashboard.chat', compact('users', 'messages', 'sender', 'chats'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        AKChat::create([
            'message' => request()->message,
            'sender_id' => Auth()->user()->id,
            'recepient_id' => request()->recepient_id,
            'isRead' => false,
        ]);
        return redirect()->back()->with('success', 'Message sent');
    }

    public function show($id)
    {
        $users = User::where('id', '!=', Auth()->user()->id)->get();
        $sender = User::findOrFail($id);

        $chats = [];
        foreach ($users as $user) {
            $chat = AKChat::where('recepient_id', $user->id)->orWhere('sender_id', $user->id)->orderBy('created_at', 'desc')->first();
            if ($chat != null) {
                array_push($chats, ['message' => $chat->message, 'user_id' => $user->id]);
            }
        }
        $messages = AKChat::where([['recepient_id', Auth()->user()->id], ['sender_id', $id]])->orWhere([['sender_id', Auth()->user()->id], ['recepient_id', $id]])->get();
        foreach ($messages as $message) {
            $message->isRead = true;
            $message->update();
        }
        return view('dashboard.chat', compact('users', 'messages', 'sender', 'chats'));
    }

    public function edit(AKChat $aKChat)
    {
        //
    }


    public function update(Request $request, AKChat $aKChat)
    {
        //
    }
    public function destroy(AKChat $aKChat)
    {
        //
    }
}
