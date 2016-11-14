@extends('layouts.master')
@section('title', 'View a ticket')

@section('content')

<div class="container col-md-10 col-md-offset-1">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Ticket details</h3>
        </div>
    <div class="well well bs-component">
        <div class="content">
            <div>
                <div class="col-md-5"><h4 style="margin:0;"><strong>Name</strong>: {!! $ticket->title !!}</h4></div>
                <div class="col-md-2"><strong>Status</strong>: 
                    <span class="label label-primary" id="{!! $ticket->status['id'] !!}">{!! $ticket->status['name'] !!}</span>
                </div>
                <div class="col-md-2"><strong>Priority</strong>: 
                    <span class="label label-default" style="background-color:{{$ticket->priority['color']}}">{{ $ticket->priority['name'] }}</span>
                </div>
                <div class="col-md-3"><strong>Opened by</strong>: <span class="label label-default">{!! $ticket->user->name !!}</span></div>
                <div class="col-md-3"><strong>Created at</strong>: {!! $ticket->getDate() !!}
                </div>
            </div>
            <div class="col-md-12">
            <hr>
                <h4 class="col-md-10"><strong>Description</strong>: {!! $ticket->content !!}</h4>
                <div class="col-md-2">
                <label>
                    <input type="checkbox" name="status" {!! $ticket->status?"":"checked"!!} > Close this ticket
                </label>
                </div>
            </div>
        </div>



        <div class="clearfix"></div>
    </div>

    @foreach($comments as $comment)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Answered by <strong>{!! $comment->user->name !!}</strong> at {!! $comment->getDate() !!}</h4>
        </div>
        <div class="well well bs-component">
            <div class="content">
                {!! $comment->content !!}
            </div>
        </div>
    </div>
    @endforeach

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><strong>Reply:</strong></h4>
        </div>
    </div>
    <form class="form-horizontal" method="post" action="/comment">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{!! $ticket->id !!}">
    @foreach($errors->all() as $error)
        <p class="error_msg alert alert-danger">{{ $error }}</p>
    @endforeach            
        <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
                <textarea class="form-control" rows="2" id="content" name="content"></textarea>
                <span class="help-block">Leave your reply here</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ url('/tickets') }}" class="btn btn-danger gradient btn-sm">Cancel</a>
                <button type="submit" class="btn btn-primary gradient btn-sm pull-right">Post</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection


