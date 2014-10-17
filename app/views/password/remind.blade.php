@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>Reset password</h1>
		</div>
	</div>
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			@include('partials.errors')
			@include ('password._remind-form')
		</div>
	</div>
@stop