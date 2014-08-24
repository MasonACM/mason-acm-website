<div class="row thread">
	<div class="col-sm-1 label-replies">
		<i class="fa fa-share"></i> {{ $thread->replies() }}
	</div>
	<div class="col-sm-6">
		<a href="{{ $thread->getUrl() }}" class="thread-title">
			{{ $thread->title }}
		</a>
	</div>
	<div class="col-sm-2 pull-right label-user">
		<i class="fa fa-user"></i>&nbsp;
		{{ $thread->posts->first()->user->present()->fullname() }}
	</div>
	<div class="col-sm-2 pull-right label-time">
		<i class="fa fa-clock-o"></i> 
		{{ $thread->posts->first()->present()->date() }}
	</div>
</div>