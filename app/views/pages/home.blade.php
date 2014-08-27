@extends('layouts.master')

@section('title', 'Home')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1 class="text-center">Mason ACM</h1>
		</div>
	</div>
	<div class="container spacing-top">
		@if (MasonACM\Models\LanParty::hasActiveParty())	
			<div class="col-md-6">
				<a href="{{ URL::route('lanparty.register') }}" class="btn btn-huge-block">
					<i class="fa fa-gamepad"></i> LAN Party
				</a>
			</div>
		@endif
		<div class="col-md-6">
			<a href="{{ URL::route('forum.index') }}" class="btn btn-huge-block">
				<i class="fa fa-comment"></i> Forum
			</a>
		</div>
		<div class="col-md-6">
			<a href="{{ URL::route('vb') }}" class="btn btn-huge-block">
				<i class="fa fa-cloud-download"></i> Visual Basic 6
			</a>
		</div>
		<div class="col-md-6">
			<a href="{{ URL::route('sig.index') }}" class="btn btn-huge-block">
				<i class="fa fa-users"></i> Special Interest Groups
			</a>
		</div>
		@if (!MasonACM\Models\LanParty::hasActiveParty())
			<div class="col-md-6">
				<a href="{{ URL::route('about') }}" class="btn btn-huge-block">
					<i class="fa fa-question-circle"></i> About
				</a>
			</div>
		@endif
	</div>
@stop

