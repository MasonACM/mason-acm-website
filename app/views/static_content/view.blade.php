@extends('layouts.master')

@section('title')
	$cont->title;
@stop

@section('content')
	<div class="row">
		<div class="col-md-10">
			<div class="article">
				$cont->body;
			</div>
		</div>
	</div>
@stop