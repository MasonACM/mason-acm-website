@extends('layouts.master')

@section('jumbotron')
	<div class="jumbotron">
		<div class="container">
			<h1 class="text-center">Mason ACM</h1>
		</div>
	</div>
@stop

@section('content')
		<div class="row main-content">
	
		<a href='forum'>	
			<div class="col-md-6 large-link large-link-left">				
				<h2>
					Forum &nbsp;
					<span class="fa fa-comments-o"></span>
				</h2>
			</div>
		</a>

		<a href='sig'>
			<div class="col-md-6 large-link  large-link-right">				
				<h2>
					Special Interest Groups &nbsp;
					<span class="fa fa-group"></span>
				</h2>
			</div>
		</a>
	</div> <!-- End Row -->
	
	<div class='row main-content'>

		<a href='tutorials'>
			<div class="col-md-6 large-link  large-link-left">				
				<h2>
					Tutorials &nbsp;
					<span class="fa fa-file-text"></span>
				</h2>
			</div>
		</a>

		@if(!$lanPartyIsActive)
			<a href='about'>
				<div class="col-md-6 large-link  large-link-left">				
					<h2>
						About &nbsp;
						<span class="fa fa-eye"></span>
					</h2>
				</div>
			</a>
		@else
			<a href='lanparty'>
				<div class="col-md-6 large-link  large-link-right">				
					<h2>
						Lan Party &nbsp;
						<span class="fa fa-gamepad"></span>
					</h2>
				</div>
			</a>
		@endif

	</div> 
@stop

@section('javascript')
	<script type="application/javascript">
		$(function() {
			$('.large-link').hide().fadeIn(600);
		});
	</script>
@stop
