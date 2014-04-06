@extends('layouts.masterWithTitle')

@section('title')
	Create Thread	
@stop

@section('content')
	{{ Form::open() }}	
		<input type="hidden" name="topic_id" value="{{ $topic_id }}">
		<div>
			{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
		</div><br>
		<div>
			{{ Form::textarea('body', null, ['class' => 'editor']) }}
		</div><br>	
		<div>
			{{ Form::submit('Create Thread', ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}	
@stop

@section('javascript')
	{{ HTML::script('ckeditor-user/ckeditor.js') }}
	{{ HTML::script('ckeditor-user/adapters/jquery.js') }}
	<script type="application/javascript">
		$(function() {	
			$('.editor').ckeditor();
		});
	</script>
@stop