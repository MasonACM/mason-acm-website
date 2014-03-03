@extends('layouts.masterWithTitle')

@section('title')
	Tutorials
@stop

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			@foreach(TutorialTopic::all() as $tt)
				<br><br>
				{{ HTML::link('tutorials/' . $tt->name, $tt->name, ['class' => 'btn btn-inverse btn-lg']) }}
			@endforeach
			
			<br><br><br>
			{{ HTML::link('tutorials/create', 'Create Tutorial', ['class' => 'btn btn-primary btn-lg']) }}

		</div>
	</div>
@stop