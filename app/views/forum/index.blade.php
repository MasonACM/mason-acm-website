@extends('layouts.master')

@section('icon')
    <i class="fa fa-comments-o"></i>
@stop

@section('title', 'Forum')

@section('content')	
	<div class="container spacing-top">
		<div class="thread-container">
			@foreach($threads as $thread)
				@include('forum._thread', compact($thread))
			@endforeach
		</div>
		<div class="form-group row">	
			<span>{{ $threads->links() }}</span>			
			<a href="{{ URL::route('thread.create') }}" class="btn btn-primary pull-right spacing-top-sm">
				<i class="fa fa-plus"></i> Create Thread
			</a>
		</div>
	</div>
@stop