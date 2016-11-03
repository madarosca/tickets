<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Ticket;
use App\User;
use App\Comment;

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

        $ticket = Ticket::all();
        $status_pending = Ticket::where(['status' => 1])->get()->count();
        $status_answered = Ticket::where(['status' => 0])->get()->count();
        

        return view('home', array(
            'ticket' => $ticket,
            'status_pending' => $status_pending,
            'status_answered'=> $status_answered
        ));
    }
        

}
