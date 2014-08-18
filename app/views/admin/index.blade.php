@extends('layouts.master')

@section('title', 'Admin Panel')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>
				<i class="fa fa-cog fa-spin"></i> Admin Panel
			</h1>
		</div>
	</div>
	<div class="container">
		<div class="col-md-3">
			<a href="{{ URL::route('lanparty.index') }}">
				<i class="fa fa-gamepad"></i> LAN Party
			</a>
		</div>
    </div>
@stop