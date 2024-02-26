<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    function show(){
        $user = auth()->user();
        $tickets = Ticket::where('user_id', $user->id)->get();
        if ($tickets->count() == 0) {
            $tickets = null;
        }
        return view('tickets-user', [
            'user' => $user,
            'tickets' => $tickets,
        ]);
    }

    function store(Request $request){
        $user = auth()->user();
        $ticket = new Ticket();
        $ticket->user_id = $user->id;
        $ticket->title = $request->title;
        $ticket->information = $request->information;
        $ticket->contact = $user->email;
        $ticket->status = 1;
        $ticket->save();
        return redirect()
            ->route('user.tickets')
            ->with('success', 'Ticket created successfully');
    }

    function view($id){
        $ticket = Ticket::find($id);
        return view('ticket-user', [
            'ticket' => $ticket,
        ]);
    }
}
