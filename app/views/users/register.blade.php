@extends('layouts.master')

@section('title')
	Register
@stop

@section('content')

	<div class="row">
		{{ Form::open(['url'=>'users/create', 'class'=>'col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2  col-xs-10 col-xs-offset-1 user-form']) }}
			<p class='form-title'>REGISTER</p>

			<div class="form-group">
				{{ Form::label('First Name', null, ['class' => 'control-label']) }}
				{{ Form::input('text', 'firstname', null, ['class' => 'form-control']) }} 
			</div>

			<div class="form-group">
				{{ Form::label('Last Name', null, ['class' => 'control-label']) }}
				{{ Form::input('text', 'lastname', null, ['class' => 'form-control']) }} 
			</div>

			<div class="form-group">
				{{ Form::label('Email', null, ['class' => 'control-label']) }}
				{{ Form::input('email', 'email', null, ['class' => 'form-control']) }} 
			</div>

			<div class="form-group">
				{{ Form::label('Graduation Year', null, ['class' => 'control-label']) }}
				{{ Form::input('text', 'grad-year', null, ['class' => 'form-control']) }} 
			</div>

			<div class="form-group">
				{{ Form::label('Password', null, ['class' => 'control-label']) }}
				{{ Form::input('password', 'password', null, ['class' => 'form-control']) }} 
			</div>

			<div class="form-group">
				{{ Form::label('Password Confirmation', null, ['class' => 'control-label']) }}
				{{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) }} 
			</div>
			
			{{ Form::input('submit', '', 'Register', ['class' => 'btn btn-primary']) }}

			<br> <br>
			@foreach($errors->all() as $error)
				<div class="label label-danger error-label">{{ $error }}</div>
			@endforeach
						
		{{ Form::close() }}
	</div>

@stop