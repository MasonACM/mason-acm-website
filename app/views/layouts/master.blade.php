<!DOCTYPE html>
<html>
<head>
	<title>
		Mason ACM @yield('title')
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	{{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}
	{{ HTML::style('css/styles.css') }}
	@yield('css')

</head>

<body>
	{{-- Navigation bar --}}
	@include('partials.navbar')

	{{-- Main content --}}
	@yield('content')

	{{-- Javascript --}}
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
	{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
	{{ HTML::script('js/global.js') }}
	@yield('javascript')

	{{-- Flash Message modal --}}
	@if (Session::has('flash_message'))
	   @include('partials.flash-message-modal')
	@endif

	{{-- Login form modal --}}
	@if (Auth::guest())
		@include('partials.login-modal')
	@endif

	{{-- Confirm Modal --}}
	@include('partials.confirm-modal')

</body>
</html>


