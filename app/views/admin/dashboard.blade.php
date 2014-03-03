@extends('layouts.master')

@section('title')
	Admin Dashboard
@stop

@section('content')

	<h1>Admin Dashboard</h1>

	<h3>Lan Party</h3>
	<a href='admin/roster'><div class="btn btn-large btn-inverse panel">LAN Party Roster</div>
	<a href='admin/competitions'><div class="btn btn-large btn-inverse panel">LAN Party Competitions</div>
	<a href='langames'><div class="btn btn-large btn-inverse panel">LAN Party Games</div>
	<a href='langames'><div class="btn btn-large btn-inverse panel">LAN Party Games</div>

	<h3>Files</h3>
	{{ HTML::link('files/upload', 'Upload Files', array('class' => 'btn btn-large btn-inverse panel')) }}
@stop