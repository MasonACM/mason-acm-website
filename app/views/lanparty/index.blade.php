@extends('layouts.master')

@section('title', 'Manage LAN Parties')

@section('content')
	<div class="container spacing-top">
		<div class="row well">
			<div class="col-md-4">
				{{ Form::open(['route' => 'lanparty.store', 'class' => 'form-inline']) }}
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
							<i class="fa fa-plus"></i> Add
						</button>
					</div>
					<div class="form-group">
						<input name="date" id="date" class="form-control" placeholder="Date" />
						<span>{{ $errors->first('date') }}</span>
					</div>
					<input type="hidden" name="active" value="0">
				{{ Form::close() }}
			</div>
		</div>
		@foreach($parties as $party)
			<div class="row well">
				<div class="col-md-4">
					{{ Form::model($party, ['route' => ['lanparty.update', $party->id], 'class' => 'form-inline']) }}
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Update</button>
						</div>
						<div class="form-group">
							{{ Form::text('date', $party->present()->quickDate(), ['class' => 'form-control', 'id' => 'date' . $party->id]) }}
						</div>
					{{ Form::close() }}
				</div>
				<div class="col-md-2">
					<h5>
						<i class="fa fa-calendar"></i>&nbsp;
						{{ $party->present()->longDate() }}
					</h5>
				</div>
				<div class="col-md-2">
					@if ($party->active)
						{{ link_to_route('lanparty.deactivate', 'Make Inactive', $party->id, ['class' => 'btn btn-danger']) }}
					@else
						{{ link_to_route('lanparty.activate', 'Make Active', $party->id, ['class' => 'btn btn-primary']) }}
					@endif
				</div>
				<div class="col-md-2">
					<a href="{{ URL::route('lanparty.roster', $party->id) }}" class="btn btn-primary">
						<i class="fa fa-list-alt"></i> {{ $party->attendees()->count() }} Attendees
					</a>
				</div>
				<div class="col-md-1">
					<a href="{{ URL::route('competitions.index') }}" class="btn btn-primary">
						<i class="fa fa-gamepad"></i>
					</a>
				</div>
				<div class="col-md-1">
					{{ Form::delete(['route' => 'lanparty.destroy', 'confirm']) }}
				</div>
			</div>
		@endforeach
	</div>
@stop