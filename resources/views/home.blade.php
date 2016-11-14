@extends('layouts.master')
@section('title', 'Tickets Dashboard')

@section('content')
<div class="container col-md-10 col-md-offset-1">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            	<h4>Hello <strong>{{Auth::user()->name}}</strong>. For today you have:</h4>
        </div>
        <div class="panel-body">
            <div class="panel panel-info panel_totals col-md-12">
                <div class="panel-body">
                    <div class="col-md-6"><a href="{{ url('/tickets') }}">Total Tickets: <span class="label label-primary">{{ $tickets->count() }}</span></a>
                    </div>
                    <div class="col-md-6"><a href="{{ url('/mytickets') }}">Your Tickets: <span class="label label-primary">{{ $my_tickets->count() }}</span></a>
                    </div>
                </div>
            </div>
            <div class="panel panel-warning panel_totals col-md-12">
                <div class="panel-body">
                    <div class="col-md-12">With status:</div>
                   
                    <div class="row">
                    @foreach($tickets as $ticket)
                    <div class="col-md-4">{{ $ticket->status['name']}}</div>
                    <div class="col-md-5">{{ count(App\Ticket::where('status_id', '=', $ticket->status_id)->get()) }}</div>
                    @endforeach
                    </div>
                    <div class="col-md-12">
                        @foreach($tk_statuses as $tk)
                        {{ $tk }}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel panel-success panel_totals col-md-12">
                <div class="panel-body">
                    <div class="col-md-3">Tickets with priority:</div>
                     @foreach($priorities as $priority)
                     <div class="col-md-3">{{ $priority->name }}: <span class="label label-danger" style="background-color:{{ $priorities[0]->color }}"></span></div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection