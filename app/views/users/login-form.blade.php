{{ Form::open(array('route' => 'login.post')) }}
	
	<p class='form-title'>LOGIN</p>
	<div class="form-group">
		{{ Form::label('Email', null, ['class' => 'control-label']) }}
		{{ Form::email('email', null, ['class' => 'form-control email']) }}  
	</div>

	<div class="form-group">
		{{ Form::label('Password', null, ['class' => 'control-label']) }}
		{{ Form::input('password', 'password', null, ['class' => 'form-control']) }}
	</div>

	<div class="checkbox">
		<label class="remember-label">
			{{ Form::checkbox("remember", 'no', false) }} Remember me					
		</label>
	</div> <br>
		
	{{ Form::input('submit', '', 'Login', ['class' => 'btn btn-primary']) }} &nbsp;&nbsp;&nbsp;
	
	@if(Session::has('auth_message'))
		<div class="help-block text-error">{{ Session::get('auth_message') }}</div>
	@endif
{{ Form::close() }}