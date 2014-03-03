@extends('layouts.master')

@section('title')
	New SIG
@stop

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@if(Auth::check() && Auth::user()->role >= 1)	
				{{ HTML::link('sig/edit/' . $sig->id, 'Edit', ['class' => 'green']) }}
				{{ Form::open(['url' => 'sig/delete/' . $sig->id, 'class' => 'delete-form']) }}
					{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
				{{ Form::close() }}
			@endif
			<div class="article">
				{{ $sig->body }}
			</div>
		</div>
	</div>
@stop