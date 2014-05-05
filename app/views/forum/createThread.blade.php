@extends('layouts.masterWithTitle')

@section('title')
	Create Thread	
@stop

@section('content')
	{{ Form::open(['route' => 'forum.thread.store']) }}
		<input type="hidden" name="topic_id" value="{{ $topic_id }}">
		<div>
			{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
		</div><br>
		<div>
			{{ Form::textarea('body', null, ['class' => 'editor form-control']) }}
		</div><br>	
		<div>
			{{ Form::submit('Create Thread', ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}	
@stop