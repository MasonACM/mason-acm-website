@extends('layouts.masterWithTitleAndIcon')

@section('icon')
    <i class="fa fa-info-circle"></i>
@stop

@section('title')
	About
@stop

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>About</h1>
		</div>
	</div>
	<div class="container">
		<div class="text-section">
			<h2>General Information</h2>
			<p>The Mason ACM is part of an international organization, ACM.  ACM is an organization for computing professionals to deliver resources that advance computing as a science and a profession.</p>
			<p>To learn more about ACM as a whole, please visit their <a href="http://www.acm.org/">website</a>.</p>	
			<h2>Location:</h2>
			<p>Mr. Kummer's room (B109) on Tuesdays and Thursdays from 2:15 to 3:15.</p>
		</div>			
	</div>
@stop