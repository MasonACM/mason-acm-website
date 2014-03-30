@extends('layouts.master')

@section('title')
	Forum
@stop

@section('content')
	<?php $topic = $thread->getTopic(); ?>

	<ul class="breadcrumb">
		<li> {{ HTML::link('forum', 'Forum') }} 
			<span class="divider"></span>
		</li>
	    <li> 
	    	{{ HTML::link('forum/topic/' . $topic->id, $topic->name) }} 
	    	<span class="divider"></span>
	    </li>
	    <li class="active">Thread</li>
	</ul>

	<!-- Green thread title header -->	
	<div class="row">
		<div class="forum-topic col-md-12">	
			<span>
				{{ $thread->title }}
				<div class="pull-right">
					{{ $thread->getReplies() }}
				</div>
			</span>	
		</div>
	</div>

	<!-- Posts -->
	@foreach($posts as $post)			
		
		<div class="row">
			<div class="forum-post col-md-12">			
				<span class="col-md-2">			
					<div class="forum-author">
						{{ $post->getUser()->fullname() }}
					</div>							
					<div>
					  	<div class='forum-time'>{{ $post->getDate() }}</div> 
					</div>
					<br>
				</span>													
				<span class="forum-body col-md-10">  
					{{ $post->body }} 
				</span>
			</div>
		</div>
	@endforeach
	
	<div class="row">
		@if(Auth::check())
			{{ Form::open(['url' => 'forum/post/create', 'class' => 'col-md-8 forum-reply-form']) }}
				<input type="hidden" name="thread_id" value="{{ $thread->id }}">	
				<div class="form-group">
					{{ Form::textarea('body', null, ['rows' => '5', 'class' => 'form-control', 'style' => 'resize: none;']) }}  
				</div>
				<div>
					{{ Form::submit('Reply', ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}
		@else
			<br><br>
			{{ HTML::link('/users/login', 'Login to reply!', array('class' => 'btn btn-primary')) }}				
		@endif
	</div>
@stop