@extends('layouts.masterWithTitle')

@section('title')
	Admin Dashboard
@stop

@section('content')

	<h3>LAN Party</h3>
	<a href='{{ URL::to('lanparty/roster') }}'><div class="panel-button btn btn-large btn-inverse panel">LAN Party Roster</div>
	<a href='{{ URL::to('lanparty/manage') }}'><div class="panel-button btn btn-large btn-inverse panel">LAN Party Roster</div>
	<br><br><br>

	<h3>Files</h3>
	{{ HTML::link('files/upload', 'Upload Files', array('class' => 'panel-button btn btn-large btn-inverse panel')) }}
@stop