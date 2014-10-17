@extends('layouts.master')

@section('title', 'Competitions')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> Gaming Competitions</h1>
		</div>
	</div>
	<div class="container">
		@if (Auth::admin())
			<div class="row">
				<div class="well">
					@include ('lanparty.competition._competition-form')
				</div>
			</div>
		@endif
		<div class="row">
			@if ($competitions->isEmpty())
				<h1>No competitions have been created - check again later</h1>				
			@else
				@foreach ($competitions as $competition)
					@include ('lanparty.competition._competition', ['competition' => $competition])
				@endforeach
			@endif
		</div>	
	</div>
@stop
