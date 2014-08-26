@extends('layouts.master')

@section('title', 'Create Thread')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>
				<i class="fa fa-plus"></i> 
				Create thread
			</h1>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-3 well">
		{{ Form::open(['route' => 'thread.store']) }}
			<div class="form-group">
				{{ Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Title', 'required']) }}
				<span class="error">{{ $errors->first('title') }}</span>
			</div>
			<div class="form-group">
				{{ Form::textarea('body', null, ['class' => 'form-control input-lg', 'placeholder' => 'Body', 'required']) }}
				<span class="error">{{ $errors->first('body') }}</span>
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
			</div>
		{{ Form::close() }}
	</div>
@stop