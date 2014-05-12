@extends('layouts.masterWithTitleAndIcon')

@section('icon')
    <i class="fa fa-group"></i>
@stop

@section('title')
	Special Interest Groups
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">		
			@if($admin)		
				{{ HTML::linkWithIcon('sig/create', 'Create', 'fa', 'plus', ['class' => 'btn btn-primary']) }}
			@endif

			@foreach($all_sig as $sig)		
				{{ HTML::linkWithIcon('sig/' . $sig->url, $sig->name, 'fa', $sig->icon, ['class' => 'btn btn-inverse sig-btn']) }}
			@endforeach
		</div>
	</div>

@stop