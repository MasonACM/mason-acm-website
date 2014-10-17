{{ Form::open(array('route' => 'login.post')) }}	
	<div class="form-group">
		{{ Form::email('email', null, ['class' => 'form-control input-lg email', 'placeholder' => 'Email']) }}  
	</div>
	<div class="form-group">
		{{ Form::input('password', 'password', null, ['class' => 'form-control input-lg', 'placeholder' => 'Password']) }}
	</div>
	<div class="form-group">
		<a href="{{ URL::route('password.remind') }}">
			Reset password
		</a>
	</div>
	<button class="btn btn-primary btn-lg btn-block">Login</button>
	@if (Session::has('auth_message'))
		<div class="error">
			{{ Session::get('auth_message') }}
		</div>
	@endif
{{ Form::close() }}