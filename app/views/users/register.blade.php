@extends('layouts.master')

@section('title')
	Register
@stop

@section('content')

	<div class="row">
		{{ Form::open(['url'=>'users/create', 'class'=>'col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2  col-xs-10 col-xs-offset-1 user-form']) }}
			<p class='form-title'>REGISTER</p>

			<div class="form-group">
				{{ Form::label('First Name', 'firstname', ['class' => 'control-label']) }}
				{{ Form::text('firstname', null, ['class' => 'form-control']) }} 
				{{ $errors->first('firstname', '<span class="help-block text-error">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('Last Name', null, ['class' => 'control-label']) }}
				{{ Form::text('lastname', null, ['class' => 'form-control']) }} 
				{{ $errors->first('lastname', '<span class="help-block text-error">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('Email', null, ['class' => 'control-label']) }}
				{{ Form::email('email', null, ['class' => 'form-control']) }} 
				{{ $errors->first('email', '<span class="help-block text-error">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('Graduation Year', null, ['class' => 'control-label']) }}
				{{ Form::text('grad_year', null, ['class' => 'form-control']) }} 
				{{ $errors->first('grad_year', '<span class="help-block text-error">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('Password', null, ['class' => 'control-label']) }}
				{{ Form::password('password', ['class' => 'form-control']) }} 
				{{ $errors->first('password', '<span class="help-block text-error">:message</span>') }}
			</div>	

			<div class="form-group">
				{{ Form::label('Password Confirmation', null, ['class' => 'control-label']) }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }} 
			</div>
			
			{{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
		{{ Form::close() }}
	</div>
@stop