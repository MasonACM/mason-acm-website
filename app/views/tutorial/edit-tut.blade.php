@extends('layouts.master')

@section('title')
	Create Tutorial
@stop

@section('content')

	{{ HTML::script('ckeditor-user/ckeditor.js') }}
	{{ HTML::script('ckeditor-admin/adapters/jquery.js') }}
	{{ HTML::style('highlighter/theme.css')}}
	{{ HTML::script('highlighter/prettify.js')}}

	<br>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">	
			{{ Form::model($tut) }}				
				<!-- Creates hidden field for the author_id -->
				{{ Form::hidden('author_id', Auth::user()->id) }}
				<div class="form-group">
					{{ Form::label('title', 'Tutorial Title', ['class' => 'control-label']) }}
					{{ Form::text('title', null, ['class' => 'form-control']) }}  
				</div>
				<br> 
				<div class="row">
					<div class="form-group col-md-8">
						{{ Form::label('tut_topic_id', 'Category', ['class' => 'control-label']) }}
						{{ Form::select('tut_topic_id', TutorialTopic::getArray(), null, ['class' => 'form-control']) }}
					</div>
				</div>

				<br>
				{{ Form::textarea('body', '', ['id' => 'editor', 'tabindex' => '-1']) }} <br> <br>
				<div>
					{{ Form::submit('Create Tutorial', ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}
			<br><br>
			<h3>Preview</h3>
			<div class="article" id="preview">
			</div>
		</div>
	</div>
	<script>	
		 $(document).ready(function() {	
		 	var editor = $('#editor');
		 	var flag = false;
		 	editor.ckeditor();
		 	CKEDITOR.instances.editor.on('contentDom', function() {
		 		CKEDITOR.instances.editor.document.on('keydown', function(e) {
			 		$('#preview').html(CKEDITOR.instances.editor.getData());
			 		// todo: disable the ability to tab out
			 		var pret = $('pre');
					pret.addClass('prettyprint').css('font-size', 14);
					prettyPrint();		
		 		});
		 	});
		 });
	</script>
@stop