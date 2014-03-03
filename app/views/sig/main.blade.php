@extends('layouts.master')

@section('title')
	New SIG
@stop

@section('content')

	<div class="row">
		<div class="col-md-12">	
			
			@foreach($all_SIG as $SIG)		
				{{ HTML::link('sig/' . $SIG->url, $SIG->name, ['class' => 'btn btn-inverse sig-btn']) }}
			@endforeach

		</div>
	</div>

@stop