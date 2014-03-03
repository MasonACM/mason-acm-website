{{ Form::open(array('url' => 'lanparty/update','route' => 'login', 'class' => 'form-inline')) }}

	<h4 class='header-green'>This is your LAN Party information.  It can be updated anytime.</h4>

	{{ Form::checkbox('attending_lan', 'yes', LanAttendee::isAttendingLan(), ['id' => 'attending_lan']), 
	   Form::label(null, 'I am attending the LAN Party on December 20th, 2013', array('class' => 'checkbox')) }}

	<br><br>
	<h4 class='sig-header'> I will compete in these <b><i>solo</i></b> competitions: </h4>
	
	@foreach( LanGame::all() as $game)
		@if($game->max_players == 1)	
			{{ Form::checkbox("game" . $game->id, 'yes', LanPlayer::isPlayingGame($game->id), ['class' => 'playing_game']), 
			   Form::label(null, $game->Title, array('class' => 'checkbox')) }}  <br>
		@endif
	@endforeach

	<br><br>	
	<h4 class='sig-header'> I will be compete in these <b><i>team</i></b> gaming competitions</h4>

	@foreach( LanGame::all() as $game )
		@if($game->max_players > 1)	
			{{ Form::checkbox("game" . $game->id, 'yes', LanPlayer::isPlayingGame($game->id), ['class' => 'playing_game']),
			   Form::label(null, $game->Title, array('class' => 'checkbox')) }} <br>
		@endif
	@endforeach

	<br><br>

	{{ Form::submit('Update', array('id' => 'Create', 'class' => 'btn btn-primary', 'value' => 'Sign Up')) }} 
	
{{ Form::close() }}

<script>
	
	$(document).ready(function() {	

		var setValues = function(el) {
			var isChecked = $(el).is(':checked');
			$('.playing_game').attr('disabled', !isChecked);
		};
		
		$('#attending_lan').on('change', function() {
			setValues(this); 
		});
		
		setValues($('#attending_lan'));

	});	

</script>