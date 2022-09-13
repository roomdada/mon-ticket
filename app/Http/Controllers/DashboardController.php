<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    return view('dashboard', [
      'users' => User::count(),
      'tickets' => Ticket::count(),
      'ticketTypes' => TicketType::count(),
      'openedTickets' => auth()->user()->tickets->where('state', Ticket::OPENED)->count(),
      'closedTickets' => auth()->user()->tickets->where('state', Ticket::CLOSED)->count(),
      'allTickets' => auth()->user()->tickets->count(),
    ]);
  }
}
