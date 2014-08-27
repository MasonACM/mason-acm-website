@extends('layouts.master')

@section('title', 'Download Visual Basic 6')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>Download VB6</h1>
		</div>
	</div>
	<div class="container">
		<div class="interest-group-html">
			<h3>Install instructions:</h1>
			<ol>
				<li><a href="https://docs.google.com/uc?export=download&confirm=SDDd&id=0B6J2gN36UgP2ZDhuLTRXQmlRMmM">Download</a> the VB6 file</li>
				<li>Extract the zip file</li>
				<li>Run ALL msi files in the extracted folder</li>
				<li>To launch vb6 go to C:\Program Files (x86)\Microsoft Visual Studio\VB98\VB6.EXE</li>
			</ol>
		</div>

		{{ HTML::linkWithIcon('https://docs.google.com/uc?export=download&confirm=SDDd&id=0B6J2gN36UgP2ZDhuLTRXQmlRMmM', 'Download', 'cloud-download', ['class' => 'btn btn-lg btn-primary spacing-top-sm']) }}	
	</div>
@stop