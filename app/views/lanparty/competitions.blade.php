@foreach(LanGame::all() as $game) 
	
	<h3>{{ $game->Title }}</h3>

	@if($game->max_players == 1)
		
		<ul>
			@foreach($game->players() as $player)
				<li>{{ $player->user()->fullname() }} </li>
			@endforeach
		</ul>

	@else
		
		@foreach($game->teams() as $team)
			
			{{ $team->name }} 

			<ul>
				@foreach($team->players() as $teamPlayer)
					<li>{{ $teamPlayer->user()->fullname() }}</li>
				@endforeach
			</ul>

		@endforeach
	@endif

@endforeach