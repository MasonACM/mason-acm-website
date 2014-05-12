@extends('layouts.masterWithTitleAndIcon')

@section('icon')
    <i class="fa fa-{{ $sig->icon }}"></i>
@stop
@section('title')
	{{ $sig->name }}
@stop

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if($admin)	
				{{ HTML::link('sig/' . $sig->id . '/edit', 'Edit', ['class' => 'btn btn-primary']) }}
				<br /> <br />
				{{ Form::delete('sig/' . $sig->id . '/delete') }}	
			@endif
			<br /> <br />
			<div class="article">
				{{ $sig->body }}
			</div>
		</div>
	</div>
@stop