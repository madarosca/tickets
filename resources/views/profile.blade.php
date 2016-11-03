@extends('layouts.master')
@section('title', 'Edit a ticket')

@section('content')
    <div class="container col-md-10 col-md-offset-1">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h3>Edit your profile</h3>
            </div>
        <div class="well well bs-component">
            <form class="form-horizontal col-md-offset-2" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                    <div class="form-group">
                        <label for="title" class="col-md-1 control-label">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-1 control-label">E-mail</label>
                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                         @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-1">
                            <a href="{{ URL::previous() }}" class="btn btn-danger gradient btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-info gradient btn-sm pull-right">Update</button>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
@endsection