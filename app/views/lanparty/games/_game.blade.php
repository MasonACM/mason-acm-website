<div class="col-md-4">
	<div class="game-card">
		@if (Auth::admin())
			<div class="game-card-actions">
				{{ Form::open(['route' => ['games.destroy', $game->party->id, $game->id], 'method' => 'DELETE', 'confirm']) }}
					<button type="submit" class="btn btn-danger">
						<i class="fa fa-times"></i>
					</button>
				{{ Form::close() }}
			</div>
		@endif
		<div class="h3">
			<a href="{{ URL::route('teams.index', $game->id) }}">{{ $game->title }}</a>
		</div>
		<div class="h4">
			{{ $game->present()->playerCount(); }}
		</div>	
	</div>
</div>