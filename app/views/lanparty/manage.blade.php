@extends('layouts.masterWithTitle')

@section('title')
	Manage LAN Parties
@stop

@section('content')
	@foreach($lans as $lan)	
		{{ $lan->getDate() }}		
	@endforeach
@stop