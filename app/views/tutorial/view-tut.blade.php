@extends('layouts.master')

@section('title')
	Tutorial
@stop

@section('content')

	{{ HTML::style('highlighter/theme.css')}}

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
			<h1>{{ $tut->title }}</h1> <br>
			
			@if(Auth::check())
				@if((Auth::user()->id == $tut->author_id) || (Auth::user()->role >= 1))
					{{ Form::open(['url' => 'tutorials/delete/' . $tut->id, 'class' => 'delete-form']) }}
						{{--{{ HTML::link('tutorials/edit/' . $tut->id, 'Edit', ['class' => 'btn btn-primary']) }}--}}
						{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
					{{ Form::close() }}
				@endif
			@endif

			<br><br>

			<div class="article">
				{{ $tut->body }}		
			</div>

		</div>
	</div>

	{{ HTML::script('highlighter/prettify.js')}}

	<script>

		$(document).ready(function() 
		{
			var editor = $('pre');
			editor.addClass('prettyprint').css('font-size', 14);
			var str = editor.html().trimLeft();
			editor.html(str);
			prettyPrint();		
		});
	    
	</script>
@stop
        
