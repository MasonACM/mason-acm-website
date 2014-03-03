@extends('layouts.masterWithTitle')

@section('title')
	LAN Party Sign up
@stop

@section('content')
	
	<div class="row">
		<div class="col-md-10">

			<h2><span class="glyphicon glyphicon-calendar"></span> &nbsp; {{ $party->getDate() }}</h2>
			<h2><span class="glyphicon glyphicon-home"></span> &nbsp; Mason High School, Small Commons</h2>
			<br>

			{{ Form::open() }}
				@if(!LAN_Attendee::isAttendingLan())
					{{ Form::submit('I want to go the the LAN Party!', array('class' => 'btn btn-lg btn-primary')) }}
				@else
					{{ Form::submit("I don't want to go anymore!", array('class' => 'btn btn-lg btn-danger')) }}
					<br><br>
					<a href="{{ URL::to('lanparty/games') }}" class="btn btn-lg btn-primary">&nbsp;<span class="glyphicon glyphicon-tower"></span> Sign Up For Gaming Competition</a>
				@endif
			{{ Form::close() }}

		</div>
	</div>

@stop