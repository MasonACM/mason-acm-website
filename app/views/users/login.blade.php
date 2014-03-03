@extends('layouts.master')

@section('title')
	Login
@stop

@section('content')
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2  col-xs-10 col-xs-offset-1 user-form">
			{{ View::make('users.login-form') }}
		</div>
	</div>
@stop