<!DOCTYPE html>
<html>
<head>
    <title>
        Mason ACM | @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}
    {{ HTML::style('css/styles.css') }}
    {{ HTML::style('css/acmicon.css') }}
    @yield('css')

</head>

<body>
    @include('partials.navbar')

    @yield('pageTitle')

    @yield('jumbotron')

    <div class="container" style="padding: 20px;">                 
        {{-- NoScript Friendly flash message --}}
        @if(Session::has('message'))
            <div class="alert alert-danger" id="alert">{{ Session::get('message') }}</div> 
        @endif
        
        {{-- Main content --}}
        @yield('content')                                                
    </div>

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
    {{ HTML::script('js/comfirm_delete.js') }}
    @yield('javascript')

    {{-- Global javascript --}}
    <script type="application/javascript">
        $(function() {
            // Banner animation
            var banner = $('.banner-heading');
            banner.hide().fadeIn(700); 
        });
    </script>

    {{-- April Fools Day Joke --}}
    {{ HTML::script('js/april-fools.js') }}
    
    {{-- Flash Message modal --}}
    @if(Session::has('flash_message'))
       @include('partials.flash-message-modal') 
    @endif 

    {{-- Login form modal --}}
    @if(Auth::guest())
        @include('partials.login-modal')
    @endif 

</body>
</html>


