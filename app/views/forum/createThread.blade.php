@extends('layouts.master')

@section('title')
	Forum
@stop

@section('content')
	{{ HTML::script('ckeditor-user/ckeditor.js') }}
	{{ HTML::script('ckeditor-user/adapters/jquery.js') }}

	{{ Form::open(['action'=>'ForumController@postCreatethread']) }}
		
		<input type="hidden" name="topic_id" value="{{ $topic_id }}">

		<div>
			{{ Form::text('title', null, ['placeholder' => 'Title']) }}
		</div><br>

		<div>
			{{ Form::textarea('body', null, ['class' => 'editor']) }}
		</div><br>
		
		<div>
			{{ Form::submit('Create Thread', ['class' => 'btn btn-primary']) }}
		</div>

	{{ Form::close() }}

	<script>
		
		$(document).ready(function() {
			$('.editor').ckeditor();
		});

	</script>
@stop