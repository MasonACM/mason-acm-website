@extends('layouts.master')

@section('title')
	Edit SIG
@stop

@section('content')
	{{ Form::model($sig) }}
		{{ Form::hidden('id', $sig->id) }}	
		<div>
			{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
		</div><br>
		<div>
			{{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Url']) }}
		</div><br>
		<div>
			{{ Form::textarea('body', null, ['class' => 'editor']) }}
		</div><br>
		<div>
			{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
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