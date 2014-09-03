<div class="row thread-list-item">
	<div class="col-sm-1">
		<span class="thread-list-replies">
			<i class="fa fa-share"></i> {{ $thread->replies() }}
		</span>
	</div>
	<div class="col-sm-6">
		<a href="{{ $thread->getUrl() }}" class="thread-list-title">
			{{{ $thread->title }}}
		</a>
	</div>
	<div class="col-sm-2 pull-right">
		<span class="thread-list-user">
			<i class="fa fa-user"></i> {{ $thread->posts->first()->user->present()->fullname() }}
		</span>
	</div>
	<div class="col-sm-2 pull-right">
		<span class="thread-list-time">
			<i class="fa fa-clock-o"></i> {{ $thread->posts->first()->present()->date() }}
		</span>
	</div>
</div>
