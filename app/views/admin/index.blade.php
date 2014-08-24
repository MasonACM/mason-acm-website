@extends('layouts.master')

@section('title', 'Admin Panel')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>
				<i class="fa fa-cog fa-spin"></i> Admin Panel
			</h1>
		</div>
	</div>
	<div class="container">
		<div class="col-md-3">
			<a href="{{ URL::route('lanparty.index') }}" class="btn btn-huge">
				<i class="fa fa-gamepad"></i> LAN Party
			</a>
		</div>
		<div class="col-md-3">
			<a href="{{ URL::route('users.index') }}" class="btn btn-huge">
				<i class="fa fa-users"></i> Manage Users
			</a>
		</div>
    </div>
@stop