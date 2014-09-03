<div class="col-md-3">
	<div class="game-card">
		<h1>{{ $team->name }}</h1>
		<div class="label label-primary">
			{{ $team->memberCount() }} / {{ $competition->max_players }}
		</div> 
		<ul class="player-list">
			@foreach ($team->competitors as $competitor)
				<li>{{ $competitor->user->present()->fullName() }}</li>
			@endforeach
		</ul>
		@if ($team->check())
			{{ Form::open(['route' => ['competitors.destroy', $team->id], 'method' => 'DELETE']) }}
				<button class="btn btn-danger" type="submit">Leave team</button>
			{{ Form::close() }}
		@else
			@if ($team->isFull())
				<button class="btn btn-primary disabled">
					<i class="fa fa-check"></i> Team full
				</button>
			@else
				{{ Form::open(['route' => ['competitors.store', $competition->id]]) }}
					<input type="hidden" name="team_id" value="{{ $team->id }}"/>
					<button class="btn btn-primary" type="submit">Join team</button>
				{{ Form::close() }}
			@endif
		@endif
	</div>
</div>