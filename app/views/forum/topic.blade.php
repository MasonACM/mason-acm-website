@extends('layouts.master')

@section('title')
	Forum
@stop

@section('content')
	<ul class="breadcrumb">
		<li> {{ HTML::link('forum', 'Forum') }} <span class="divider"></span></li>
	    <li class="active">{{ $topic->name }}</li>
	</ul>

	<div class="row">

		<div class="forum-topic col-md-10 col-xs-7">
			{{ $topic->name }}
		</div>
		

		<a class='col-md-2 col-xs-5 forum-new-thread green-glow' href='/forum/newthread/{{ $topic->id }}'> 
			<i class='icon-plus icon-white'></i> New Thread
		</a>

		<br>
	</div>

	@foreach($topic->getThreads($topic->id) as $thread)
		
		<div class="row">
			{{ HTML::link('forum/thread/' . $thread->id, $thread->title, ['class' => 'col-md-10 col-xs-8 forum-thread']); }}
			<a class='col-md-2 col-xs-4  forum-reply-large green-glow' href='/forum/thread/{{ $thread->id }}'> <i class='icon-pencil icon-white'></i> Reply</a>
		</div>

	@endforeach
@stop