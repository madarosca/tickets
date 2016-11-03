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
            <div><h4 class="header"><strong>Name</strong>: {!! $ticket->title !!}</h4></div>
            <div> <strong>Status</strong>: <span class="label label-success">{!! $ticket->status ? 'Pending' : 'Answered' !!}</span></div>
            <div> <strong>Opened by</strong>: <span class="label label-primary">{!! $ticket->user->name !!}</span></div>
            <div> <strong>Created at</strong>: {!! $ticket->created_at !!}</div>
            <div> <strong>Description</strong>: {!! $ticket->content !!}</div>
        </div>
        <div class="clearfix"></div>
    </div>

    @foreach($comments as $comment)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Answered by <strong>{!! $comment->user->name !!}</strong> at {!! $comment->created_at !!}</h4>
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
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="post_id" value="{!! $ticket->id !!}">
    @foreach($errors->all() as $error)
        <p class="error_msg alert alert-danger">{{ $error }}</p>
    @endforeach            
        <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
                <textarea class="form-control" rows="1" id="content" name="content"></textarea>
                <span class="help-block">Leave your reply here</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ URL::previous() }}" class="btn btn-danger gradient btn-sm">Cancel</a>
                <button type="submit" class="btn btn-primary gradient btn-sm pull-right">Post</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection


