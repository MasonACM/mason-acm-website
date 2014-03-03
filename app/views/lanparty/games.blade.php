<table class='table'>
	
	<thead>
		<tr class="header-white">
			<th> Title </th>
			<th> Max Players</th>
		</tr>
	</thead>


	@foreach(LanGame::all() as $game)
		<tr>
			<td> {{ $game->Title }}       </td>
			<td> {{ $game->max_players }} </td>
			<td> {{ HTML::link('langames/' . $game->id . '/edit', 'Edit', ['class' => 'btn btn-primary']) }} </td>
			<td>
				 {{ Form::open(['method' => 'DELETE', 'route' => ['langames.destroy', $game->id], 'class' => 'delete-form']) }}
					{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
				 {{ Form::close() }} 
			</td>
	    </tr>
	@endforeach

</table>

{{ HTML::link('langames/create', 'Create', ['class' => 'btn btn-primary']); }}