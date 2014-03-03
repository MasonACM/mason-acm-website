{{ Form::model($game, ['method' => 'PATCH', 'route' => ['langames.update', $game->id]]) }}
	
	<div>
		{{ Form::label('Title', 'Title:') }}
		{{ Form::text('Title') }}
	</div>

	<div>
		{{ Form::label('max_players', 'Max Players') }}
		{{ Form::text('max_players') }}
	</div>

	<div>
		{{ Form::submit('Update Game', ['class' => 'btn btn-primary']) }}
	</div>

{{ Form::close() }}
