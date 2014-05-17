@extends('layouts.masterWithTitleAndIcon')

@section('icon')
    <i class="fa fa-user-md"></i>
@stop

@section('title')
	Admin Dashboard
@stop

@section('content')
	<h3 class="help-block">LAN Party</h3>
    <div class="well">
        <a href='{{ URL::to('lanparty/manage') }}'>
            <div class="panel-button btn btn-large btn-primary panel">
                <i class="fa fa-pencil"></i> Manage
            </div>
        </a>
    </div>
@stop