<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::orderBy("created_at","desc")->paginate(10);
        return view("dashboard.tickets.index", compact("tickets"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.tickets.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = strtoupper(uniqid());
        Ticket::create([
            'ticket_no'=>$ticket,
            'email'=>request('email'),
            'subject'=>request('subject'),
            'department'=>request('department'),
            'issue'=>request('issue'),
            'isSolved'=>false
        ]);
        $message = '<p>Your ticket  '.$ticket.' of subject <b>'.request()->subject.'</b> has been recorded. <br>We .</p>';
        Mail::send('mails.ticket',
        ['message'=>$message],
        function ($message) use ($ticket) {
            $message->to(request()->email)->subject($ticket.' Update');
        });
        return redirect()->route('ticket.index')->with('success','Your ticket ('.$ticket.') has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($state)
    {
        $tickets = Ticket::where('isSolved', $state)->paginate(10);
        return view('dashboard.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        Ticket::where('id', $id)->update(['isSolved']);
        $ticket = Ticket::findOrFail($id);
        $message = '<p>Your ticket  '.$ticket->ticket_no.' of subject <b>'.$ticket->ticket_no.'</b> has been solved. <br>Thank you for your patience.</p>';
        Mail::send('mails.ticket',
        ['message'=>$message],
        function ($message) use ($ticket) {
            $message->to(request()->email)->subject(($ticket->ticket_no).' Update');
        });
        return redirect()->route('')->with('success',''.$ticket.'');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
