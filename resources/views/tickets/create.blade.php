@extends('layouts.master')
@section('title', 'Create a ticket')

@section('content')
    <div class="container col-md-10 col-md-offset-1">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Create a new ticket</h3>
            </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                
                <fieldset>
                    <div class="form-group">
                        <label for="title" class="col-md-1 control-label">Subject</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="title" name="title">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-md-1 control-label">Content</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="1" id="content" name="content"></textarea>
                            <span class="help-block">Feel free to ask us any questions.</span>
                        </div>
                    </div>

                    <div class="form col-md-10 select_menu">
                        <label for="priority" class="col-md-1 control-label">Priority</label>
                        <div class="col-md-5">
                            <select id="priority" class="selectpicker" name="priority">
                                <option value="">Choose ticket priority...</option>
                                @foreach($priorities as $priority)
                                    <option value="{{$priority->id}}">{{$priority->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form">
                            <a href="{{ URL::previous() }}" class="btn btn-danger gradient btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary gradient btn-sm pull-right">Submit</button>
                        </div>
                    </div>
                    
                </fieldset>
            </form>
        </div>
    </div>
@endsection

