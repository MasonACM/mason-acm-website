@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>
				<i class="fa fa-users"></i> Special Interest Groups
			</h1>
		</div>
	</div>
	<div class="container spacing-top">
		@foreach ($interestGroups as $group)
			<div class="col-md-6">
				<a href="{{ $group->url }}" class="btn btn-huge-block">
					{{ $group->title }}
				</a>
			</div>
		@endforeach
	</div>
@stop