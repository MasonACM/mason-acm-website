@extends('layouts.masterWithTitleAndIcon')

@section('icon')
    <i class="fa fa-pencil"></i>
@stop

@section('title')
	Edit Profile	
@stop

@section('content')
	<div class="row">
		{{ Form::model($user, ['route' => 'profile.update', 'class' => 'col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 user-form']) }}
			<p class='form-title'>Edit Profile</p>

			<div class="form-group">
				{{ Form::label('firstname', 'First Name', ['class' => 'control-label']) }}
				{{ Form::text('firstname', null, ['class' => 'form-control']) }} 
				{{ $errors->first('firstname', '<span class="help-block text-error">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('Last Name', null, ['class' => 'control-label']) }}
				{{ Form::text('lastname', null, ['class' => 'form-control']) }} 
				{{ $errors->first('lastname', '<span class="help-block text-error">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('Graduation Year', null, ['class' => 'control-label']) }}
				{{ Form::text('grad_year', null, ['class' => 'form-control']) }} 
				{{ $errors->first('grad_year', '<span class="help-block text-error">:message</span>') }}
			</div>
			
			{{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
		{{ Form::close() }}
	</div>
@stop