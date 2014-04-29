<!DOCTYPE html>
<html>
<head>
    <title>
        Mason ACM @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    {{ HTML::style('css/styles.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}
    {{ HTML::style('//code.ionicframework.com/ionicons/1.4.1/css/ionicons.min.css') }} 
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
                 <a class="navbar-brand" href='{{ URL::to('/') }}'>
                    <object type="image/svg+xml" data="{{ URL::to('img/MasonACM_icon.svg') }}" width=26 height=18></object> &nbsp; Mason ACM
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(LAN_Party::hasActiveParty())
                        <li>{{ HTML::linkWithIcon('lanparty', 'LAN Party', 'gamepad') }}</li>
                    @endif
                    <li>{{ HTML::linkWithIcon('forum', 'Forum', 'comments-o') }}</li>
                    <li>{{ HTML::linkWithIcon('tutorials', 'Tutorials', 'file-text') }}</li>
                    <li>{{ HTML::linkWithIcon('sig', 'Special Interest Groups', 'group') }}</li>
                    <li>{{ HTML::linkWithIcon('about', 'About', 'eye') }}</li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::check())
                        <li>{{ HTML::linkWithIcon('users/login', 'Login', 'sign-in', ['id' => 'login-link']) }}</li>
                        <li>{{ HTML::linkWithIcon('users/register', 'Register', 'plus') }}</li>   
                    @else
                        <li>{{ HTML::linkWithIcon('users/logout', 'Logout', 'sign-out') }}</li> 
                        @if(Auth::user()->role >= 1)
                            <li>{{ HTML::linkWithIcon('admin', 'Admin', 'user') }}</li> 
                        @endif
                    @endif
                </ul>  
            </div>
        </div> 
    </div>

    @yield('pageTitle')

    @yield('jumbotron')

    <div class="container" style="padding: 20px;">                 
        @if(Session::has('message'))
            <div class="alert alert-danger" id="alert">{{ Session::get('message') }}</div> 
        @endif

        @yield('content')                                                
    </div>

    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
    {{ HTML::script('js/comfirm_delete.js') }}
    @yield('javascript')
    
    <!-- Flash Message -->
    @if(Session::has('message'))
        <div class="modal fade" id="message-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 style="display: inline-block;">
                            <span>{{ Session::get('message') }}</span>
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
                    </div>
                </div>
            </div>
        </div>

        <script> 
            $(function() { 
                // Hide the non-javascript friendly error message
                $('#alert').hide();

                $('#message-modal').modal();
            });
        </script>
    @endif 

    <!-- Login pop-up form -->
    @if(!Auth::check())
         <div class="modal fade form-modal" id="login-modal">
             <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-body">
                        @include('users.login-form')
                    </div>
                </div>
            </div>
        </div>
       
        <script>
            $(function() {
                $('#login-link').on('click', function(e) {
                    e.preventDefault();
                    $('#login-modal').on('shown.bs.modal', function(e) {
                        $('.email').focus();
                    });
                    $('#login-modal').modal();    
                });
            });
        </script>
    @endif
        <script>
            var d = new Date();
            if(d.getMonth()==3 && d.getDate()==1){
                var rand = Math.floor((Math.random()*180)+1);
                document.writeln("<style>");
                document.writeln("html{");
                document.writeln("  -ms-transform: rotate("+rand+"deg);");
                document.writeln("  -webkit-transform: rotate("+rand+"deg);");
                document.writeln("  transform: rotate("+rand+"deg);");
                document.writeln("}");
                document.writeln("</style>");
            }
        </script>
</body>
</html>


