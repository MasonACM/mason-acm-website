@extends('layouts.masterWithTitleAndIcon')

@section('icon')
    <i class="ai ai-vb6"></i>
@stop

@section('title', 'Download Visual Basic 6')

@section('content')
	{{ HTML::linkWithIcon('', 'Download', 'fa', 'cloud-download', ['class' => 'btn btn-lg btn-primary']) }}	
@stop