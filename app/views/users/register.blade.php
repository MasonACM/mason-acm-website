@extends('layouts.master')

@section('title')
	Register
@stop

@section('content')
	<div class="container">	
		<div class="col-sm-offset-3 col-sm-6 spacing-top well">
			{{ Form::open(['route' => 'register']) }}
				<div class="form-group">
					{{ Form::text('firstname', null, ['class' => 'form-control input-lg', 'placeholder' => 'Firstname', 'required']) }}
					<span class="error">{{ $errors->first('firstname') }}</span>
				</div>
				<div class="form-group">
					{{ Form::text('lastname', null, ['class' => 'form-control input-lg', 'placeholder' => 'Lastname', 'required']) }}
					<span class="error">{{ $errors->first('lastname') }}</span>
				</div>
				<div class="form-group">	
					{{ Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email', 'required']) }}
					<span class="error">{{ $errors->first('email') }}</span>
				</div>
				<div class="form-group">
					{{ Form::text('grad_year', null, ['class' => 'form-control input-lg', 'placeholder' => 'Graduation Year'], 'required') }} 
					<span class="error">{{ $errors->first('grad_year') }}</span>
				</div>
				<div class="form-group">
					{{ Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Password'], 'required') }} 
					<span class="error">{{ $errors->first('password') }}</span>
				</div>	
				<div class="form-group">
					{{ Form::password('password_confirmation', ['class' => 'form-control input-lg', 'placeholder' => 'Password Confirmation'], 'required') }}
				</div>
				<button class="btn btn-transparent btn-lg btn-block" type="submit">Register</button>
			{{ Form::close() }}
		</div>
	</div>
@stop
