@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-user"></i> Profile</h1>
		</div>
	</div>
	<div class="container">
		<div class="col-md-5 well">
			{{ Form::model($user, ['route' => 'profile.update', 'method' => 'PUT']) }}
				<div class="form-group">
					<input type="text" name="firstname" class="form-control input-lg" value="{{ $user->firstname }}" placeholder="Firstname" />
					<span class="error">{{ $errors->first('firstname') }}</span>
				</div>
				<div class="form-group">
					<input type="text" name="lastname" class="form-control input-lg" value="{{ $user->lastname }}" placeholder="Lastname" />
					<span class="error">{{ $errors->first('lastname') }}</span>
				</div>
				<div class="form-group">
					<input type="text" name="grad_year" class="form-control input-lg" value="{{ $user->grad_year }}" placeholder="Graduation Year" />
					<span class="error">{{ $errors->first('grad_year') }}</span>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Update</button>
			{{ Form::close() }}
		</div>

		<div class="col-md-5 col-md-offset-1 well">
			{{ Form::open(['route' => 'password.change']) }}
				<div class="form-group">
					<input type="password" name="current-password" class="form-control input-lg" placeholder="Current password">
				</div>
				<div class="form-group">
					<input type="password" name="new-password" class="form-control input-lg" placeholder="New password">
				</div>
				<div class="form-group">
					<input type="password" name="password-confirmation" class="form-control input-lg" placeholder="Confirm new password">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Change password</button>
			{{ Form::close() }}
		</div>
	</div>
@stop