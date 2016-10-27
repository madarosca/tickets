@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<<<<<<< HEAD
                <div class="panel-heading">Welcome {{ Auth::user()->name }}</div>
                <div class="panel-body"></div>
=======
                <div class="panel-heading">Welcome {{Auth::user()->name}}</div>
                <div class="panel-body">You are logged in!</div>
>>>>>>> refs/remotes/tickets/master
            </div>
        </div>
    </div>
</div>
@endsection
