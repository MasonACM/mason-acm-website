@extends('layouts.master')

@section('title')
	Game Sign up
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{{ Form::open() }}
					@foreach($game as $games)
						
					@endforeach
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop