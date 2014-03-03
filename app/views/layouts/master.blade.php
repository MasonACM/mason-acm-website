<!DOCTYPE html>
<html>
    <head>
        <title>
            Mason ACM | @yield('title')
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS is placed here -->
        {{ HTML::style('css/bootstrap3.css') }}
        {{ HTML::style('css/body.css') }}
        {{ HTML::style('css/styles.css') }}


        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery.min.js') }}
        {{ HTML::script('js/bootstrap3.js') }}
        {{ HTML::script('js/jquery.dataTables.js') }}
        {{ HTML::script('js/bootbox.js') }}
        {{ HTML::script('js/comfirm_delete.js') }}



        <!-- Ckeditor css overrides -->
        <style>
    
            .cke .cke_source {
                border: none;
                color: black;
            }

        </style>
        

    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{ HTML::link('/', 'Mason ACM', ['class' => 'navbar-brand']) }}
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>{{ HTML::link('forum', 'Forum') }}</li> 
                    <li>{{ HTML::link('tutorials', 'Tutorials') }}</li> 
                    <li>{{ HTML::link('sig', 'Special Interest Groups') }}</li> 
                    <li>{{ HTML::link('lanparty', 'LAN Party', ['class' => 'lanparty-button']) }}</li> 
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    @if(!Auth::check())
                        <li>{{ HTML::link('users/login', 'Login') }}</li>
                        <li>{{ HTML::link('users/register', 'Register') }}</li>   
                    @else
                        <li>{{ HTML::link('users/logout', 'Logout') }}</li>
                        
                        @if(Auth::user()->role >= 1)
                            <li>{{ HTML::link('admin', 'Admin') }}</li>

                            @if(Auth::user()->role == 2)
                                <li>{{ HTML::link('superadmin', 'Super Admin') }}</li>
                            @endif
                        @endif
                    @endif

                </ul>  
            </div> <!-- /nav-collapse -->
        </div> <!-- /container -->
    </div> <!-- /navbar -->


        @yield('pageTitle')

        <!-- The Jumbotron must be outside a container div -->
        @yield('jumbotron')

        <div class="container" style="padding: 20px;">                
            
            @if(Session::has('message'))
                <script> 
                    $(function() { 
                        bootbox.alert("{{ Session::get('message') }}"); 
                    });
                </script>
            @endif
           
            @yield('content')               
                                  
        </div>
    </body>


    <script>
        $(document).ready(function() {   
            // $('.lanparty-button').on('click', function(e) {
                // e.preventDefault();
                // bootbox.alert('No LAN Party is scheduled at this time.');
            // });
        });
    </script>

</html>


