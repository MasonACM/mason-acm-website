@extends('layouts.master')

@section('content')
	<div class="jumbotron">
	<div class="container">
		<h1>{{ $interestGroup->title }}</h1>
		</div>
	</div>
	<div class="container">
		<div class="interest-group-html">
			{{ $interestGroup->html }}
		</div>
	</div>
@stop