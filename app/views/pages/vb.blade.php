@extends('layouts.master')

@section('title', 'Download Visual Basic 6')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>Download VB6</h1>
		</div>
	</div>
	<div class="container">
		<div class="text-section">
			<h1>Install instructions:</h1>
			<ol>
				<li><a href="{{ Config::get('masonacm.vb6-download-url') }}">Download</a> the VB6 file</li>
				<li>Extract the zip file</li>
				<li>Run ALL msi files in the extracted folder</li>
				<li>To launch vb6 go to <i>C:\Program Files (x86)\Microsoft Visual Studio\VB98\VB6.EXE</i></li>
			</ol>
		</div>

		<a href="{{ Config::get('masonacm.vb6-download-url') }}" class="btn btn-primary btn-lg spacing-top-sm">
			<i class="fa fa-cloud-download"></i> Download
		</a>
	</div>
@stop