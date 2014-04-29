{{ Form::open(['url' => 'lanparty/roster/add']) }}	
	
	<p class='form-title'>Add to roster</p>
	<div class="form-group"> 
		{{ Form::input('firstname', 'firstname', null, ['class' => 'form-control', 'id' => 'firstname-input', 'placeholder' => 'First Name']) }}	
	</div>

	<div class="form-group">
		{{ Form::input('lastname', 'lastname', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}	
	</div>

	{{ Form::hidden('lanparty_id', LAN_Party::getActiveParty()->id) }}

	<button class="btn btn-primary" type="submit">Add</button>	
{{ Form::close() }}