@extends('layouts.master')

@section('title', 'Download Visual Basic 6')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>Download VB6</h1>
		</div>
	</div>
	<div class="container">
		{{ HTML::linkWithIcon('https://drive.google.com/file/d/0B6J2gN36UgP2ZDhuLTRXQmlRMmM/edit?usp=sharing', 'Download', 'cloud-download', ['class' => 'btn btn-lg btn-primary']) }}	
	</div>
@stop