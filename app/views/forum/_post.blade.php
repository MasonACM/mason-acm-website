<div class="row post">
	<div class="post-actions">
		@if(Auth::admin())
			{{ Form::open(['route' => ['post.destroy', $post->id], 'method' => 'DELETE', 'confirm' => 'Are you sure you want to delete this post?']) }}
				<button type="submit" class="btn btn-delete-post">
					<i class="fa fa-times"></i>
				</button>
			{{ Form::close() }}
		@endif
	</div>
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