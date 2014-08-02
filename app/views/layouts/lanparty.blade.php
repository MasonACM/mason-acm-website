@extends('layouts.master')

@section('javascript')
	@yield('lp-javascript')
	<script type="application/javascript">
		$(function() {
			$('body').addClass('lan-party');
		});
	</script>
@stop