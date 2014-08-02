<div class="row post">
	<div class="col-sm-2">
		<div class="label-user">
			<i class="fa fa-user"></i>
			{{ $post->user->present()->fullname() }}
		</div>
		<br />
		<div class="label-time">
			<i class="fa fa-clock-o"></i>
			{{ $post->present()->date() }}
		</div>
	</div>
	<div class="col-sm-10">
		<div class="post-body">{{ $post->body }}</div>
	</div>
</div>