{{ Form::open(['route' => 'password.remind', 'class' => 'well']) }}
	<div class="form-group">
		<input type="text" name="email" class="form-control input-lg" placeholder="Email" />	
	</div>
	<button type="submit" class="btn btn-primary">
		Send password reset email
	</button>
{{ Form::close() }}