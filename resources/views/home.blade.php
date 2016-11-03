@extends('layouts.master')
@section('title', 'Dashboard')

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
                <div class="panel panel-info panel_totals">
                    <div class="panel-body">
                        Total Tickets: <span class="label label-primary">{{ $ticket->count() }}</span>
                    </div>
                </div>
                <div class="panel panel-warning panel_totals">
                    <div class="panel-body">
                        Tickets with status Open: <span class="label label-danger">1</span>
                    </div>
                </div>
                <div class="panel panel-warning panel_totals">
                    <div class="panel-body">
                        Tickets with status Pending: <span class="label label-warning">{{ $status_pending }}</span>
                    </div>
                </div>
                <div class="panel panel-success panel_totals">
                    <div class="panel-body">
                        Tickets with status Answered: <span class="label label-success">{{ $status_answered }}</span>
                    </div>
                </div>
                <div class="panel panel-success panel_totals">
                    <div class="panel-body">
                        Tickets with priority High: <span class="label label-danger">3</span>
                    </div>
                </div>
                <div class="panel panel-success panel_totals">
                    <div class="panel-body">
                        Tickets with priority Normal: <span class="label label-info">4</span>
                    </div>
                </div>
                <div class="panel panel-success panel_totals">
                    <div class="panel-body">
                        Tickets with priority Low: <span class="label label-default">2</span>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
