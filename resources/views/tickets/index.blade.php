@extends('layouts.master')
@section('title', 'View all tickets')

@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Tickets </h2>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($tickets->isEmpty())
                <div class="panel-body"> There are no tickets.</div>
            @else
                <div class="row">
                <div class="panel-body title-text-strong col-md-12 ">
                    <div class="col-md-2">ID</div>
                    <div class="col-md-4">Title</div>
                    <div class="col-md-2">Status</div>
                    <hr>
                    @foreach($tickets as $ticket)
                        <div class="row">
                        <div class="panel-body col-md-12">
                            <div class="col-md-2">{!! $ticket->id !!}</div>
                            <div class="col-md-4"><a href="{!! action('TicketsController@show', $ticket->slug) !!}">{!! $ticket->title !!} </a></div>
                            <div class="col-md-2">{!! $ticket->status ? 'Pending' : 'Answered' !!}</div>
                            <div class="col-md-2">
                                <a href="{!! action('TicketsController@edit', $ticket->slug) !!}" class="btn btn-info btn-sm" style="margin:-5px 0 0 0">Edit</a></div>
                            <div class="col-md-2">
                                <form method="post" action="{!! action('TicketsController@destroy', $ticket->slug) !!}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div>
                                <button type="submit" class="btn btn-warning btn-sm" style="margin:-5px 0 0 0">Delete</button>
                            </div>
                            </form></div>
                        </div>
                        </div>
                    @endforeach
                    </tbody>
                </div>
                </div>
            @endif
        </div>
    </div>

@endsection