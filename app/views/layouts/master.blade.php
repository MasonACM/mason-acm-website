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

	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="MasonACM" />
	<meta property="og:url" content="{{ URL::to('/') }}" />
	<meta property="og:title" content="LAN Party sign up" />
	<meta property="og:image" content="{{ URL::asset('img/lan-wp.png') }}" />

</head>

<body>
	{{-- Navigation bar --}}
	@include('partials.navbar')

	{{-- Main content --}}
	@yield('content')

	{{-- Javascript --}}
	{{ HTML::script('js/app.js') }}
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


