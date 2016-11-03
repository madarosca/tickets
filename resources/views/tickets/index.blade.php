@extends('layouts.master')
@section('title', 'View all tickets')

@section('content')

<div class="container col-md-10 col-md-offset-1">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>All Tickets</h3>
        </div>

        @if ($ticket->isEmpty())
            <div class="panel-body"> There are no tickets.</div>
        @else
            <div class="panel-body">
                @foreach($ticket as $tk)
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="col-md-1">{!! $tk->id !!}
                            </div>
                                <div class="col-md-3"><a href="{!! action('TicketsController@show', $tk->slug) !!}" style="font-weight: 900;">{!! $tk->title !!} </a>
                                </div>
                            <div class="col-md-2">
                                <span class="label label-success">{!! $tk->status ? 'Pending' : 'Answered' !!}</span>
                            </div>
                            <div class="col-md-2">
                                <span class="label label-default">{!! $tk->user->name !!}</span>
                            </div>
                            <div class="col-md-2">{!! $tk->created_at !!}
                            </div>
                            <div class="col-md-1">
                                <a href="{!! action('TicketsController@edit', $tk->slug) !!}" class="btn btn-primary gradient btn-xs pull-right" style="margin:-5px 0 0 0">Edit</a>
                            </div>
                            <div class="col-md-1">
                                <form method="post" action="{!! action('TicketsController@destroy', $tk->slug) !!}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <button type="submit" class="btn btn-danger gradient btn-xs pull-right" style="margin:-5px 0 0 0">Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
