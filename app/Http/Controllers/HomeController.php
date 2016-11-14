<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\Priority;
use App\Status;
use App\Ticket;
use App\User;


class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest())
        {
            return view('main');
        }

        $tickets = Ticket::all();
        $my_tickets = Ticket::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
        $priorities = Priority::all();
        $statuses = Status::all();
        $tk_statuses = $tickets->pluck('status_id');
       
        return view('home', array(
            'tickets' => $tickets,
            'my_tickets' => $my_tickets,
            'priorities' => $priorities,
            'statuses' => $statuses,
            'tk_statuses' => $tk_statuses
        ));
    }
        

}
