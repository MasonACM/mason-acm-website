@extends('layouts.master')

@section('title')

@stop

@section('content')
	@foreach(ForumTopic::all() as $topic)
		<div class="row">
			{{ HTML::link('forum/topic/' . $topic->id, $topic->name, ['class' => 'col-md-10 col-xs-7 forum-topic']) }}
			<a class='col-md-2 col-xs-5 forum-new-thread green-glow' href="{{ URL::to('forum/thread/create/' . $topic->id) }}">
				<i class='fa fa-plus'></i>&nbsp; New Thread
			</a>
		</div>
		<div class="row ">
			@foreach($topic->getFirstFiveThreads() as $thread)
				{{ HTML::link('forum/thread/' . $thread->id, $thread->title, ['class' => 'col-md-10 col-xs-8 forum-thread']) }}
				<a class='col-md-2 col-xs-4 forum-reply-large green-glow' href='forum/thread/{{ $thread->id }}'> 
					<i class='icon-pencil icon-white'></i> Reply
				</a>
			@endforeach
		</div>
	@endforeach
@stop