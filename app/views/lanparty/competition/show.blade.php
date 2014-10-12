@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-gamepad"></i> {{ $competition->game_title }}</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ URL::route('competitions.index') }}" class="btn btn-lg btn-primary">
					<i class="fa fa-arrow-left"></i> Competitions
				</a>
			</div>
		</div>
		<div class="row spacing-top-sm">	
			<div class="col-md-4">
				@if ($competition->isTeamBased() && !$competition->check())
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
		<div class="row spacing-top-sm">
			@if ($competition->isTeamBased())
				@foreach ($competition->teams as $team)
					@include('lanparty.competition._team', ['team' => $team])
				@endforeach
			@else
				<div class="col-md-12">
					<div class="card">
						<ul class="player-list">
							@foreach ($competition->teams as $team)
								<li>{{ $team->playerName() }}</li>
							@endforeach
						</ul>
						@if ($competition->check())
							{{ Form::open(['route' => ['competitors.destroy', $team->id], 'method' => 'DELETE']) }}
								<button class="btn btn-lg btn-danger" type="submit">
									<i class="fa fa-reply"></i> Drop out 
								</button>
							{{ Form::close() }}
						@else
							{{ Form::open(['route' => ['competitors.store', $competition->id]]) }}
								<button class="btn btn-lg btn-primary" type="submit">
									<i class="fa fa-plus"></i> Sign up
								</button>
							{{ Form::close() }}
						@endif
					</div>
				</div>
			@endif
		</div>
	</div>
@stop