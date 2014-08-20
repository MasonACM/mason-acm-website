@extends('layouts.lanparty')

@section('title', 'LAN Party sign up')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> LAN Party signup</h1>
		</div>
	</div>
	<div class="container">
		<h1 class="well col-md-6">
			<i class="fa fa-fw fa-calendar fa-blue"></i>
			<span>{{ $party->present()->shortDate() }}</span>
		</h1>
		<h1 class="well col-md-6">
			<i class="fa fa-fw fa-clock-o fa-yellow"></i>
			<span>4pm - 11pm</span>
		</h1>
		<h1 class="well col-md-6">
			<i class="fa fa-fw fa-map-marker fa-red"></i>
			<span>Small Commons</span>
		</h1>
		<h1 class="well col-md-6">
			<i class="fa fa-fw fa-usd fa-green"></i>
			<span>10</span>
		</h1>
		{{ Form::open(['route' => 'lanparty.roster.add']) }}
			@if (Auth::check())
				@if ($isAttendee)
					<button class="btn btn-lg btn-primary" disabled>
						You are now pre-registered!
					</button>
					<div type="submit" class="btn-link">
						(un-pre-register)
					</div>
				@else
					<button type="submit" class="btn btn-primary btn-lg">
						Click here to pre-register!
					</button>
				@endif
			@else
				<a href="{{ URL::route('login') }}" class="btn btn-lg btn-primary">
					Login to pre-register!
				</a>
			@endif
		{{ Form::close() }}
	</div>
@stop
