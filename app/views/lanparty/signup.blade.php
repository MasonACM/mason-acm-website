@extends('layouts.lanparty')

@section('title')
	LAN Party Sign up
@stop

@section('content')	
	<div class="row">
		<div class="lan-party-content col-md-12">	
			<h1><i class="fa fa-calendar fa-blue"></i>&nbsp;&nbsp;<span>{{ $party->present()->formattedDate() }}</span></h1>
			<h1><i class="fa fa-clock-o fa-yellow"></i>&nbsp;&nbsp;<span>4pm - 11pm</span></h1>
			<h1><i class="fa fa-map-marker fa-red"></i>&nbsp;&nbsp;&nbsp;<span>Small Commons</span></h1>
			<h1><i class="fa fa-usd fa-green"></i>&nbsp;&nbsp;&nbsp;10</h1>
		
			{{ Form::open() }}
				<div class="vs-md">
					@if(!$isAttendingLan)
						{{ Form::submit('I want to go the the LAN Party!', array('class' => 'btn btn-lg btn-primary')) }}
					@else
						{{ Form::submit("I don't want to go anymore!", array('class' => 'btn btn-lg btn-danger')) }}	
					@endif
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop