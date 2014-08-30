@extends('layouts.lanparty')

@section('title', 'LAN Party sign up')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> LAN Party signup</h1>
		</div>
	</div>
	<div class="container">
		<div class="lan-info-container">
			<div class="col-md-6">
				<h1 class="lan-info-block lan-info-date">
					<i class="fa fa-fw fa-calendar"></i>
					<span>{{ $party->present()->shortDate() }}</span>
				</h1>
			</div>
			<div class="col-md-6">
				<h1 class="lan-info-block lan-info-time">
					<i class="fa fa-fw fa-clock-o"></i>
					<span>4pm - 11pm</span>
				</h1>
			</div>
			<div class="col-md-6">
				<h1 class="lan-info-block lan-info-location">
					<i class="fa fa-fw fa-map-marker"></i>
					<span>Small Commons</span>
				</h1>
			</div>
			<div class="col-md-6">
				<h1 class="lan-info-block lan-info-money">
					<i class="fa fa-fw fa-usd"></i>
					<span>10</span>
				</h1>
			</div>
		</div>
		<div class="register-form-container">
			{{ Form::open(['route' => ['lanparty.roster.add', $party->id]]) }}
				@if (Auth::check())
					@if ($isAttendee)
						<button class="btn btn-lg btn-primary" disabled>
							<i class="fa fa-check"></i> you are now pre-registered!
						</button>
						<div class="pull-right">
							<a href="{{ URL::route('competitions.index') }}" class="btn btn-lg btn-info">
								<i class="fa fa-arrow-right"></i> Sign up for gaming tournaments! 
							</a>
						</div>
						<div>
							<button type="submit" class="btn-link">
								(un-pre-register)
							</button>
						</div>	
					@else
						<button type="submit" class="btn btn-primary btn-lg">
							<i class="fa fa-plus"></i> Click here to pre-register!
						</button>
					@endif
				@else
					<a href="{{ URL::route('login') }}" class="btn btn-lg btn-primary">
						Login to pre-register!
					</a>
				@endif
			{{ Form::close() }}
		</div>
	</div>
@stop
