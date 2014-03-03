{{ Form::open(['method' => 'POST', 'route' => ['langames.store']]) }}
	
	<div>
		{{ Form::label('Title', 'Title:') }}
		{{ Form::text('Title') }}
	</div>

	<div>
		{{ Form::label('max_players', 'Max Players') }}
		{{ Form::text('max_players') }}
	</div>

	<div>
		{{ Form::submit('Add Game', ['class' => 'btn btn-primary']) }}
	</div>

{{ Form::close() }}