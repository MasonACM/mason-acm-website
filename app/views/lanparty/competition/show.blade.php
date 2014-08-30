@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> {{ $competition->game_title }}</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				@if ($competition->isTeamBased())
		            {{ Form::open(['route' => ['teams.store', $competition->id]]) }}
		            	<div class="input-group">
							<input type="text" name="name" class="form-control input-lg" placeholder="Team name" required/>
		            		<div class="input-group-btn">
								<button class="btn btn-primary btn-lg" type="submit">Create Team</button>
							</div>
						</div>
					{{ Form::close() }}
				@endif
			</div>
		</div>
		<div class="row spacing-top">
			@if ($competition->isTeamBased())
				@foreach ($competition->teams as $team)
					@include('lanparty.competition._team', ['team' => $team])
				@endforeach
			@else
				<div class="card">
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