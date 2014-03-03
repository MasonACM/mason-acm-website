@extends('layouts.master')

@section('title')
	File Managment
@stop

@section('content')
	
	<div class="row">
		<div class="col-md-10">
			
			<h1>File Manager</h1>

			{{ Form::open(array('files' => true)) }}
				<br />
				
				<div class="form-group">	    
				    {{ Form::file('file') }}
				    <p class="help-block">Select the file you want to upload</p>
				</div>

				{{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}

			{{ Form::close() }}

		</div>
	</div>

@stop