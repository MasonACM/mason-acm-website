<?php $count = 1; ?>



	@foreach(LanGame::all() as $game)
		@if($game->max_players > 1 && data::isPlayingGame($game->id) == true)
			
			<div class="article">
				<h4 class='header-green'>{{ $game->Title }} </h4><br>
					<table class='table team-table'>
					
						@foreach(LanTeam::all() as $team)
							@if($team->game_id == $game->id)	
								<tr>
									<td>{{ $team->name }}</td>
									<td>{{ data::getTeamCount($team->id) }}</td>
									<td> 

										@if(!data::isOnTeam($team->id) && data::getTeamCount($team->id) < $game->max_players)
											{{ HTML::link('lanteam/join/' . $team->id . '/' . $game->id, 'Join') }} 
										@elseif(data::isOnTeam($team->id))
											{{ HTML::link('lanteam/join/0/' . $game->id, 'Leave') }}
										@else
											{{ "<p class='disabled-link'>Team full</p>" }}
										@endif

									</td> 
									
									@if(Auth::user()->role >= 1 || $team->creator_id == Auth::user()->id)
										<td>
											{{ Form::open(['method' => 'POST', 'url' => 'lanteam/removeteam', 'class' => 'delete-form']) }} 
												<input type="hidden" name="team_id" value="{{ $team->id }}"/>
												<input type='submit' value='Delete' class="btn btn-danger"></input>
											{{ Form::close() }}
										</td>
									@endif

								<tr>
							@endif
						@endforeach
					</table>
					
				<br><div class="btn btn-primary create-team" game='{{ $game->id }}'>Create Team</div>
			</div>

		@endif
	@endforeach


<script>

	$('.create-team').on('click', function() {
		var game = $(this).attr('game');
        var form = "<form method='POST' action='lanteam/create/" + game + "' id='form'>  <input type='text' name='teamName' placeholder='Team Name'> </form>";
		bootbox.confirm(form,  
			function(result) {
		        if(result)
		            $('#form').submit();
			});
	});	

</script>