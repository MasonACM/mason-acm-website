@extends('layouts.master')

@section('title')
	Forum
@stop

@section('content')
	{{ Form::open(['action'=>'ForumController@postCreatetopic']) }}
		
		<div>
			{{ Form::text('name', null, ['placeholder' => 'name']) }}
		</div><br>

		<div>
			{{ Form::textarea('description', null, ['placeholder' => 'Description', 'style' => 'width: 368px; height: 83px;']) }}
		</div><br>
		
		<div>
			{{ Form::submit('Create Topic', ['class' => 'btn btn-primary']) }}
		</div>

	{{ Form::close() }}
@stop