@extends('layouts.lanparty')

@section('title')
	LAN Party Sign up
@stop

@section('content')	
	<div class="row">
		<div class="lan-party-container col-md-12">	
			<div class="lan-party-contents">
				<h1 class="lan-party-info"><i class="fa fa-calendar fa-blue"></i>&nbsp;&nbsp;<span>{{ $party->present()->shortDate() }}</span></h1>
				<h1 class="lan-party-info"><i class="fa fa-clock-o fa-yellow"></i>&nbsp;&nbsp;<span>4pm - 11pm</span></h1>
				<h1 class="lan-party-info"><i class="fa fa-map-marker fa-red"></i>&nbsp;&nbsp;&nbsp;<span>Small Commons</span></h1>
				<h1 class="lan-party-info"><i class="fa fa-usd fa-green"></i>&nbsp;&nbsp;&nbsp;10</h1>
			
				{{ Form::open() }}
					<div class="vs-md">
						@if(Auth::check())	
							@if(!$isAttendingLan)
								<div>{{ Form::submit('Click here to pre-register!', array('class' => 'btn btn-lg btn-primary')) }}</div>
							@else
								<div class="btn btn-lg btn-primary-disabled">You are now pre-registered!
								<button type="submit" class="btn btn-link">(un-pre-register)</button></div>
							@endif
						@else
							{{ link_to_route('login', 'Login to pre-register!', null, ['class' => 'btn btn-lg btn-primary']) }}
						@endif
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop

@section('lp-javascript')
	@if(!Session::has('reloaded'))
		<script type="application/javascript">
			$(function() {
				var container = $('.lan-party-container');
				var contents = $('.lan-party-contents');

				$(container).css({'height': '0px', 'padding': '0px'});
				$(contents).hide();

				$(container).animate({
					height: "500px",
					padding: "40px"
				}, 600, function () {
					contents.fadeIn(200);
				})
			})
		</script>
	@endif
@stop