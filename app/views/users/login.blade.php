@extends('layouts.master')

@section('title', 'Login')

@section('content')
	<div class="container">
		<div class="col-sm-offset-3 col-sm-6 spacing-top well">
			@include('users.login-form')
		</div>
	</div>
@stop

@section('javascript')
	<script type="application/javascript">
		$(function() {
			$('.modal').on('show.bs.modal', function() {
				$('.email').focus();
			})
		});
	</script>
@stop