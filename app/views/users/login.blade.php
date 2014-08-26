@extends('layouts.master')

@section('title', 'Login')

@section('content')
	<div class="container">
		<div class="col-sm-offset-3 col-sm-6 spacing-top well">
			@include('users.login-form')
		</div>
	</div>
@stop