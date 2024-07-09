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
        $tickets = Ticket::orderBy("created_at", "desc")->paginate(10);
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
        $tick = strtoupper(uniqid());
        $ticket = Ticket::create([
            'ticket_no' => $tick,
            'email' => request('email'),
            'subject' => request('subject'),
            'department' => request('department'),
            'issue' => request('issue'),
            'isSolved' => false
        ]);
        Mail::send(
            'mails.ticket',
            [
                'ticket' => $ticket->ticket_no,
                'subject' => $ticket->subject,
                's' => 'solved',
                'f' => 'Thank you for your patience'
            ],
            function ($message) use ($tick) {
                $message->to(request()->email)->subject($tick . ' Update');
            }
        );
        return redirect()->route('ticket.index')->with('success', 'Your ticket (' . $tick . ') has been created successfully.');
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
        // dd(request());
        Ticket::where('id', $id)->update(['isSolved' => true]);
        $ticket = Ticket::findOrFail($id);
        Mail::send(
            'mails.ticket',
            [
                'ticket' => $ticket->ticket_no,
                'subject' => $ticket->subject,
                's' => 'solved',
                'f' => 'Thank you for your patience'
            ],
            function ($message) use ($ticket) {
                $message->to($ticket->email)->subject(($ticket->ticket_no) . ' Update');
            }
        );
        return back()->with('success', $ticket->ticket_no . ' solved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
