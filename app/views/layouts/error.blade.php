@extends('layouts.masterWithTitle')

@section('title')
	@yield('error') {{ $code }}
@stop

@section('content')
    <div class="container" style="padding: 20px;">
    	<div class="row">
    		<ul style="text-align: center;">
    			<h1>Sorry, it seems that Nathan and his dinosaurs</h1>
    			<h1>are preventing you from accessing this page.</h1>
    			<img src="http://www.dinosaur-toys-collectors-guide.com/images/SafSty-Snack3.jpg">
                <h1>If you did not purposefully receive this error,</h1>
                <h1>please email the url of the current page to kuenzign@gmail.com.</h1>
    		</ul>
    	</div>
    </div>
@stop