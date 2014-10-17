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
			{{ Form::open(['route' => 'password.reset', 'class' => 'well']) }}
				<input type="hidden" name="token" value="{{ $token }}">
				<div class="form-group">
					<input type="password" name="password" class="form-control input-lg" placeholder="New password">	
				</div>
				<div class="form-group">
					<input type="password" name="password_confirmation" class="form-control input-lg" placeholder="Confirm new password">	
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-primary">
						Reset password
					</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop