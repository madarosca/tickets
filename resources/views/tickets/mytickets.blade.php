@extends('layouts.master')
@section('title', 'My tickets')

@section('content')
<div class="container col-md-10 col-md-offset-1">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>My Tickets</h3>
        </div>

        @if ($my_tickets->isEmpty())
            <div class="panel-body"><h4>There are no tickets for you today!</h4></div>
        @else

        <div class="panel panel-info">
            <div class="panel-body table-title">
                <div class="col-md-1">Ticket ID</div>
                <div class="col-md-2 col-md-offset-1">Subject</div>
                <div class="col-md-1">Status</div>
                <div class="col-md-1">Priority</div>
                <div class="col-md-2">Opened by</div>
                <div class="col-md-2">Created at</div>
                <div class="col-md-2">Actions</div>
            </div>
            <div class="panel-body">
                @foreach($my_tickets as $ticket)
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="col-md-1">{!! $ticket->id !!}
                            </div>
                            @if(strlen($ticket->title) > 100)
                                <div class="col-md-3"><a href="{!! action('TicketsController@show', $ticket->slug) !!}" title="{!! $ticket->title !!}" style="font-weight: 500;">{!! substr($ticket->title, 0, 100) !!} <small> ...view more</small></a> 
                                </div>
                            @else
                                <div class="col-md-3"><a href="{!! action('TicketsController@show', $ticket->slug) !!}" title="{!! $ticket->title !!}" style="font-weight: 500;">{!! $ticket->title !!}</a>
                                </div>
                            @endif
                            <div class="col-md-1">
                                <span class="label label-primary">{!! $ticket->status['name'] !!}</span>
                            </div>
                            <div class="col-md-1">
                                <span class="label label-default" style="background-color:{{ $ticket->priority['color'] }}">{!! $ticket->priority['name'] !!}</span>
                            </div>
                            <div class="col-md-2">
                                <span class="label label-default">{!! $ticket->user->name !!}</span>
                            </div>
                            <div class="col-md-2">{!! $ticket->getDate() !!}
                            </div>
                            <div class="col-md-1">
                                <a href="{!! action('TicketsController@edit', $ticket->slug) !!}" class="btn btn-primary gradient btn-xs pull-right" style="margin:-5px 0 0 0">Edit</a>
                            </div>
                            <div class="col-md-1">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger gradient btn-xs pull-right" data-toggle="modal" data-target="#myModal" id="{{$ticket->slug}}" style="margin:-5px 0 0 0">Delete
                                </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <p class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> Warning!</p>
                                      </div>
                                      <div class="modal-body">
                                        <h4>Are you sure you want to delete this ticket?</h4>
                                      </div>
                                      <div class="modal-footer">
                                        <form method="post" action="{!! action('TicketsController@destroy', $ticket->slug) !!}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button type="submit" class="btn btn-danger gradient btn-sm">Delete</button>
                                            <button type="button" class="btn btn-primary gradient btn-sm" data-dismiss="modal">Cancel</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        </div>
                    </div>
                @endforeach
                {{ $my_tickets->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
