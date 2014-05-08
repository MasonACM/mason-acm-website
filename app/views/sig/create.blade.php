@extends('layouts.master')

@section('title')
	Create SIG
@stop

@section('content')
	{{ Form::open() }}	
		<div>
			{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
		</div><br>
		<div>
			{{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Url']) }}
		</div><br>
		<div>
			{{ Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'Icon']) }}
		</div><br>
		<div>
			{{ Form::textarea('body', null, ['class' => 'editor']) }}
		</div><br>	
		<div>
			{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
@stop

@section('javascript')	
	{{ HTML::script('ckeditor-admin/ckeditor.js') }}
	{{ HTML::script('ckeditor-admin/adapters/jquery.js') }}
	<script>	
		$(function() {	
			$('.editor').ckeditor();
		});
	</script>
@stop