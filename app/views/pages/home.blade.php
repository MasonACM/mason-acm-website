@extends('layouts.master')

@section('jumbotron')
	<div class="jumbotron visible-md visible-lg">
		<div class="container">
			<h1 style="text-align: center;">Mason ACM</h1>
		</div>
	</div>
@stop

@section('content')

	<div class="row visible-sm visible-xs">
		<div class="col-sm-6 col-sm-offset-3">
			{{ HTML::image('img/acm_logo.png', null, ['class' => 'logo'] ) }}
		</div>
	</div>

	<div class="row">
	
		<a href='forum'>	
			<div class="col-md-6 large-link large-link-left">				
				<h2>
					Forum &nbsp;
					<span class="glyphicon glyphicon-comment"></span>
				</h2>
			</div>
		</a>

		<a href='sig'>
			<div class="col-md-6 large-link  large-link-right">				
				<h2>
					Special Interest Groups &nbsp;
					<span class="glyphicon glyphicon-user"></span>
				</h2>
			</div>
		</a>
	</div> <!-- End Row -->
	
	<div class='row'>

		<a href='tutorials'>
			<div class="col-md-6 large-link  large-link-left">				
				<h2>
					Tutorials &nbsp;
					<span class="glyphicon glyphicon-book"></span>
				</h2>
			</div>
		</a>

		<a href='' class='lanparty-button'>
			<div class="col-md-6 large-link  large-link-right">				
				<h2>
					Lan Party &nbsp;
					<span class="glyphicon glyphicon-tower"></span>
				</h2>
			</div>
		</div>
	</a> <!-- End Row -->
@stop

