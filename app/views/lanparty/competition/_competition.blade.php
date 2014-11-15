<div class="col-md-4">
	<div class="game-card">
		@if (Auth::admin())
			<div class="game-card-actions">
				<a href="{{ URL::route('competitions.edit', $competition->id) }}" class="action-edit-game">
					<i class="fa fa-pencil"></i>
				</a>
				{{ Form::open(['route' => ['competitions.destroy', $competition->id], 'method' => 'DELETE', 'confirm' => 'Are you sure you want to delete this game?']) }}
					<button type="submit" class="action-delete-game">
						<i class="fa fa-times"></i>
					</button>
				{{ Form::close() }}
			</div>
		@endif
		<div class="h3">
			<a href="{{ URL::route('competitions.show', $competition->id) }}">{{ $competition->game_title }}</a>
		</div>
		<div class="h4">
			{{ $competition->present()->teamCount(); }}
		</div>	
	</div>
</div>