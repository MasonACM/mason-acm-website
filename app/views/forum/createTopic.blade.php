@extends('layouts.master')

@section('title')
	Forum
@stop

@section('content')
	{{ Form::open(['route' => 'forum.topic.store']) }}
		
		<div>
			{{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
		</div><br>

		<div>
			{{ Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) }}
		</div><br>
		
		<div>
			{{ Form::submit('Create Topic', ['class' => 'btn btn-primary']) }}
		</div>

	{{ Form::close() }}
@stop