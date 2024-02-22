<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    function show(){
        $user = auth()->user();
        $tickets = Ticket::where('user_id', $user->id)->get();
        return view('tickets-user', [
            'user' => $user,
            'tickets' => $tickets,
        ]);
    }
}
