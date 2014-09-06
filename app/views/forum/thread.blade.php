@extends('layouts.master')

@section('content')
	<div class="container spacing-top">		
		<div class="row thread">
			<span class="thread-title pull-left">
				{{ $thread->title }}
			</span>
			<span class="thread-replies pull-right">	
				<i class="fa fa-share"></i> {{ $thread->replies }}
			</span>
		</div>	
		@foreach($posts as $post)
			@include('forum._post', compact($post))
		@endforeach
		<div class="row spacing-top-sm">
			{{ $posts->links() }}
		</div>
		<div class="row">
			@if (Auth::check())
				{{ Form::open(['route' => 'post.store', 'class' => 'row spacing-top-sm']) }}	
					<div class="col-md-8">
						{{ Form::hidden('thread_id', $thread->id) }}
						<div class="form-group">
							{{ Form::textarea('body', null, ['class' => 'form-control input-post-body', 'rows' => '6']) }}
							<span class="error">{{ $errors->first('body') }}</span>
						</div>	
						<button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-check"></i> Post</button>
					</div>
				{{ Form::close() }}
			@else
				<a href="{{ URL::route('login') }}" class="btn btn-primary btn-lg spacing-top-sm">
					<i class="fa fa-sign-in"></i>
					Login to reply!
				</a>	
			@endif	
		</div>
	</div>
@stop