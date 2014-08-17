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
					{{ $errors->first('firstname', '<span class="help-block text-error">:message</span>') }}
				</div>
				<div class="form-group">
					{{ Form::text('lastname', null, ['class' => 'form-control input-lg', 'placeholder' => 'Lastname', 'required']) }}
					{{ $errors->first('lastname', '<span class="help-block text-error">:message</span>') }}
				</div>
				<div class="form-group">	
					{{ Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email', 'required']) }}
					{{ $errors->first('email', '<span class="help-block text-error">:message</span>') }}
				</div>
				<div class="form-group">
					{{ Form::text('grad_year', null, ['class' => 'form-control input-lg', 'placeholder' => 'Graduation Year'], 'required') }} 
					{{ $errors->first('grad_year', '<span class="help-block text-error">:message</span>') }}
				</div>
				<div class="form-group">
					{{ Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Password'], 'required') }} 
					{{--$errors->first('password', '<span class="help-block text-error">:message</span>') --}}
					<span class="help-block">{{ $errors->first('password') }}</span>
				</div>	
				<div class="form-group">
					{{ Form::password('password_confirmation', ['class' => 'form-control input-lg', 'placeholder' => 'Password Confirmation'], 'required') }}
				</div>
				<button class="btn btn-transparent btn-lg btn-block" type="submit">Register</button>
			{{ Form::close() }}
		</div>
	</div>
@stop
