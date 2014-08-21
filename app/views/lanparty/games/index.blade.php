@extends('layouts.master')

@section('title', 'Games')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> Games</h1>
		</div>
	</div>
	<div class="container">
		@if (Auth::admin())
			<div class="row">
				<div class="well">
					@include ('lanparty.games._game-form')
				</div>
			</div>
		@endif
		<div class="row">
			@foreach ($games as $game)
				@include ('lanparty.games._game', ['game' => $game])
			@endforeach
		</div>	
	</div>

@stop
