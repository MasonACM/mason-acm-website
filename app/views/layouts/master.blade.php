<!DOCTYPE html>
<html>
    <head>
        <title>
            Mason ACM @yield('title')
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{ HTML::style('css/bootstrap3.css') }}
        {{ HTML::style('css/body.css') }}
        {{ HTML::style('css/styles.css') }}
        @yield('css')
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
                            <li>{{ HTML::link('users/login', 'Login', array('id' => 'login-link')) }}</li>
                            <li>{{ HTML::link('users/register', 'Register') }}</li>   
                        @else
                            <li>{{ HTML::link('users/logout', 'Logout') }}</li> 
                            @if(Auth::user()->role >= 1)
                                <li>{{ HTML::link('admin', 'Admin') }}</li> 
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
                <div class="alert alert-danger" id="alert">{{ Session::get('message') }}</div> 
            @endif
            <!-- Main Content output -->
            @yield('content')                                                
        </div>

    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap3.js') }}
    {{ HTML::script('js/bootbox.js') }}
    {{ HTML::script('js/comfirm_delete.js') }}
    @yield('javascript')

    <!-- LAN Party Message -->
    <script>
        $(document).ready(function() {   
            $('.lanparty-button').on('click', function(e) {
                 e.preventDefault();
                 bootbox.alert('No LAN Party is scheduled at this time.');
             });
        });
    </script>

    <!-- Error Message -->
    @if(Session::has('message'))
        <script> 
            $(function() { 
                // Hide the non-javascript friendly error message
                $('#alert').hide();
                bootbox.alert("{{ Session::get('message') }}"); 
            });
        </script>
    @endif 

    <!-- Login pop-up form -->
    @if(!Auth::check())
         <div class="modal fade" id="login-modal">
             <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-body">
                        @include('users.login-form')
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
       
        <script>
            $('#login-link').on('click', function(e) {
                e.preventDefault();
                $('#login-modal').modal(function() {
                    $('.email').select();
                });    

            });
        </script>
    @endif

    </body>
</html>


