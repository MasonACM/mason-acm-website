@extends('layouts.masterWithTitle')

@section('javascript')
	@yield('javascript')
	<script type="application/javascript">
		$('body').addClass('lan-party');
	</script>
@stop