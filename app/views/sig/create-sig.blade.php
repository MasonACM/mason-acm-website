@extends('layouts.master')

@section('title')
	New SIG
@stop

@section('content')
	{{ HTML::script('ckeditor-admin/ckeditor.js') }}
	{{ HTML::script('ckeditor-admin/adapters/jquery.js') }}

	{{ Form::open(['action' => 'SIGController@postCreatesig']) }}
		
		<div>
			{{ Form::text('name', null, ['placeholder' => 'Name']) }}
		</div><br>

		<div>
			{{ Form::text('url', null, ['placeholder' => 'Url']) }}
		</div><br>

		<div>
			{{ Form::textarea('body', null, ['class' => 'editor']) }}
		</div><br>
		
		<div>
			{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
		</div>

	{{ Form::close() }}

	<script>
		
		$(document).ready(function() {
			$('.editor').ckeditor();
		});

	</script>
@stop