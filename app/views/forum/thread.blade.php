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

	<!-- posts -->
	@foreach($thread->getPosts() as $post)			
		
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
		
	<br><br>

	<div class="row">
		<div class="col-md-8">
			{{ Form::open(['action'=>'ForumController@postCreatepost']) }}
				<input type="hidden" name="thread_id" value="{{ $thread->id }}">
				
				<div class="form-group">
					{{ Form::textarea('body', null, ['class' => 'form-control', 'style' => 'resize: none;']) }}  
				</div>

				<div>
					{{ Form::submit('Reply', ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop