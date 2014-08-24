@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> {{ $competition->game_title }}</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			@if ($competition->isTeamBased())
				{{ Form::open(['route' => ['teams.store', $competition->id], 'class' => 'well']) }}
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Team name" required/>
					</div>
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-plus"></i> Create Team
					</button>
				{{ Form::close() }}
			@endif
		</div>
		<div class="row">
			@if ($competition->isTeamBased())
				@foreach ($competition->teams as $team)
					@include('lanparty.competition._team', ['team' => $team])
				@endforeach
			@else
				<div class="well">
					@foreach ($competition->teams as $team)
						<h4>{{ $team->playerName() }}</h4>
					@endforeach
					@if ($team->check())
						{{ Form::open(['route' => ['competitors.destroy', $team->id], 'method' => 'DELETE']) }}
							<button class="btn btn-danger" type="submit">Drop out</button>
						{{ Form::close() }}
					@else
						@if ($team->isFull())
							<button class="btn btn-primary disabled">
								<i class="fa fa-check"></i> Team full
							</button>
						@else
							{{ Form::open(['route' => ['competitors.store', $competition->id]]) }}
								<button class="btn btn-primary" type="submit">Sign up</button>
							{{ Form::close() }}
						@endif
					@endif
				</div>
			@endif
		</div>
	</div>
@stop