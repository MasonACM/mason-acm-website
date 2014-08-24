<div class="col-md-4">
	<div class="game-card">
		@if (Auth::admin())
			<div class="game-card-actions">
				{{ Form::open(['route' => ['competitions.destroy', $competition->id], 'method' => 'DELETE', 'confirm']) }}
					<button type="submit" class="btn btn-danger">
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