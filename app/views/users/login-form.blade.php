{{ Form::open(array('route' => 'login.post')) }}	
	<div class="form-group">
		{{ Form::email('email', null, ['class' => 'form-control input-lg email', 'placeholder' => 'Email']) }}  
	</div>
	<div class="form-group">
		{{ Form::input('password', 'password', null, ['class' => 'form-control input-lg', 'placeholder' => 'Password']) }}
	</div>
	<button class="btn btn-transparent btn-lg btn-block">Login</button>
	@if(Session::has('auth_message'))
		<div class="help-block text-danger">
			{{ Session::get('auth_message') }}
		</div>
	@endif
{{ Form::close() }}