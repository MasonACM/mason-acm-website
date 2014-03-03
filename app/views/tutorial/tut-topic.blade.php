@extends('layouts.master')

@section('title')
	Create Tutorial
@stop

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				
			@foreach($tt->getTuts() as $tut)
				<br>
				<div class="article row">
					<div class="col-md-6">
						<h3>{{ HTML::link('tutorials/view/' . $tut->id, $tut->title) }}</h3>
					</div>
					<div class="col-md-6">
						<p>Created by {{ " " . $tut->getAuthor()->firstname . " " . $tut->getDate() }}</p>
					</div>
				</div>
			@endforeach

		</div>
	</div>
@stop