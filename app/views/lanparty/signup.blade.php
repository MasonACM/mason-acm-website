@extends('layouts.lanparty')

@section('title', 'LAN Party signup')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> LAN Party signup</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="lan-party-container col-md-12">
				<div class="lan-party-contents">
					<h1 class="lan-party-info">
						<i class="fa fa-fw fa-calendar fa-blue"></i>
						<span>{{ $party->present()->shortDate() }}</span>
					</h1>
					<h1 class="lan-party-info">
						<i class="fa fa-fw fa-clock-o fa-yellow"></i>
						<span>4pm - 11pm</span>
					</h1>
					<h1 class="lan-party-info">
						<i class="fa fa-fw fa-map-marker fa-red"></i>
						<span>Small Commons</span>
					</h1>
					<h1 class="lan-party-info">
						<i class="fa fa-fw fa-usd fa-green"></i>10
					</h1>
					{{ Form::open() }}
						<div class="vs-md">
							@if(Auth::check())	
								@if(!$isAttendingLan)
									<div>{{ Form::submit('Click here to pre-register!', array('class' => 'btn btn-lg btn-primary')) }}</div>
								@else
									<div class="btn btn-lg btn-primary-disabled">You are now pre-registered!
									<button type="submit" class="btn btn-link">(un-pre-register)</button></div>
								@endif
							@else
								{{ link_to_route('login', 'Login to pre-register!', null, ['class' => 'btn btn-lg btn-primary']) }}
							@endif
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop
