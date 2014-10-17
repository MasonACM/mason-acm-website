@extends('layouts.master')

@section('title', $message)	

@section('content')
	<div class="container">
		<div class="well spacing-top">
			<h1>{{ $message }}</h1>
		</div>	
	</div>
@stop