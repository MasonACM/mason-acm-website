@extends('layouts.master')

@section('title')
	Create Tutorial
@stop

@section('content')
	{{ HTML::script('ckeditor-admin/ckeditor.js') }}
	{{ HTML::script('ckeditor-admin/adapters/jquery.js') }}

	{{ Form::open(['method' => 'POST', 'route' => ['content.store']]) }}
		
		<div>
			{{ Form::text('title', null, ['placeholder' => 'Title']) }}
		</div><br>

		<div>
			{{ Form::text('url', null, ['placeholder' => 'Url']) }}
		</div><br>

		<div>
			{{ Form::textarea('content', null, ['class' => 'editor']) }}
		</div><br>
		
		<div>
			{{ Form::submit('Create Page', ['class' => 'btn btn-primary']) }}
		</div>

	{{ Form::close() }}

	<script>
		
		$(document).ready(function() {
			$('.editor').ckeditor();
		});

	</script>
@stop