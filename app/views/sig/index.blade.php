@extends('layouts.master')

@section('title')
	Special Interest Groups
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">		
			@if($admin)		
				{{ HTML::linkWithIcon('sig/create', 'Create', 'plus', ['class' => 'btn btn-primary']) }}
			@endif

			@foreach($all_sig as $sig)		
				{{ HTML::link('sig/' . $sig->url, $sig->name, ['class' => 'btn btn-inverse sig-btn']) }}
			@endforeach
		</div>
	</div>

@stop