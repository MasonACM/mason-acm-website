@extends('layouts.masterWithTitle')

@section('title')
	LAN Party Sign up
@stop

@section('content')	
	<div class="row">
		<div class="col-md-10">
			<h1><i class="fa fa-calendar fa-blue"></i>&nbsp;&nbsp;<span>{{ $party->getDate() }}</span></h1>
			<h1><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<span>4:00PM - 11:00PM</span></h1>
			<h1><i class="fa fa-map-marker fa-red"></i>&nbsp;&nbsp;&nbsp;<span>Mason High School, Small Commons</span></h1>
			<h1><i class="fa fa-usd fa-green"></i>&nbsp;&nbsp;&nbsp;10</h1>

			{{ Form::open() }}
				<div class="vs-md">
					@if($isAttendingLan)
						{{ Form::submit('I want to go the the LAN Party!', array('class' => 'btn btn-lg btn-primary')) }}
					@else
						{{ Form::submit("I don't want to go anymore!", array('class' => 'btn btn-lg btn-danger')) }}	
					@endif
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop