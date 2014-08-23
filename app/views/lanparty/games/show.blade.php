@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> {{ $game->title }}</h1>
		</div>
	</div>
	<div class="container">
		@foreach ($game->teams as $team)
			<br />{{ $team->name }}
			@foreach ($team->competitors as $competitor)
				{{ $competitor->user->firstname }} <br />
			@endforeach
		@endforeach
	</div>
@stop