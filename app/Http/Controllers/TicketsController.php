<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests;
use App\Http\Requests\TicketFormRequest;
use App\Comment;
use App\Priority;
use App\Status;
use App\Ticket;
use App\User;


class TicketsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = Ticket::orderBy('id', 'desc')->paginate(10);
        return view('tickets.index', array(
            'tickets' => $tickets,
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = Priority::all();
        $status = Status::all();
        return view('tickets.create', array(
            'priorities' => $priorities,
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        $slug = uniqid();
        $user = Auth::user()->id;
        $priorities = Priority::orderBy('id', 'asc')->get();
        $status = Status::all();
        $ticket = new Ticket(array(
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => $slug,
            'priority_id' => $request->get('priority'),
            'status_id' => $status[0]->id,
            'user_id' => $user

        ));

        $ticket->save();

        $data = array(
            'ticket' => $slug,
        );

        //Mail::send('emails.ticket', $data, function ($message) {
        //    $message->from('yourEmail@domain.com', 'Learning Laravel');
        //    $message->to('yourEmail@domain.com')->subject('There is a new ticket!');
        //});

        return redirect('/tickets')->with('status', 'Your ticket has been created! Its unique id is: ' . $slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $comments = $ticket->comments()->orderBy('id', 'desc')->get();
        
        return view('tickets.show', compact('ticket', 'comments'));
    }

     public function mytickets()
    {
        $my_tickets = Ticket::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('tickets.mytickets', compact('my_tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $priorities = Priority::orderBy('id', 'desc')->get();
        return view('tickets.edit', compact('ticket', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug, TicketFormRequest $request)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $priorities = Priority::orderBy('id', 'desc')->get();
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        $ticket->priority_id = $request->get('priority');
        $ticket->save();
       
        return redirect(action('TicketsController@index', $ticket->slug))->with('status', 'The ticket "'. $ticket->title. '" has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();
        return redirect()->back()->with('status', 'The ticket "'.$ticket->title.'" has been deleted!');
    }
}
