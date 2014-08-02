@extends('layouts.master')

@section('title', 'Home')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1 class="text-center">Mason ACM</h1>
		</div>
	</div>
@stop

@section('javascript')
	<script type="application/javascript">
		$(function() {
			$('.large-link').hide().fadeIn(600);
		});
	</script>
@stop
