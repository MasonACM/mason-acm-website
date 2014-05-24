<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav navbar-nav">
                <!--<object type="image/svg+xml" data="{{ URL::to('img/MasonACM_icon.svg') }}" width=26 height=18></object>-->
                <li style="float: left; font-size: 18px; line-height: 20px;">{{ HTML::linkWithIcon('', 'Mason ACM', 'ai', 'logo') }}</li>
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(LAN_Party::hasActiveParty())
                    <li>{{ HTML::linkWithIcon('lanparty', 'LAN Party', 'fa', 'gamepad') }}</li>
                @endif
                <li>{{ HTML::linkWithIcon('forum', 'Forum', 'fa', 'comments-o') }}</li>
                <li>{{ HTML::linkWithIcon('tutorials', 'Tutorials', 'fa', 'file-text') }}</li>
                <li class="dropdown navbar-dropdown">
                    {{ HTML::linkWithIcon('sig', 'Special Interest Groups', 'fa', 'group', ['data-toggle'=>"dropdown"]) }}
                    <ul class="dropdown-menu sig">
                        <script>var a=0;</script>
                        @foreach(SIG::all() as $sig)
                            <li>{{ HTML::linkWithIcon('sig/' . $sig->url, $sig->name, 'fa', $sig->icon) }}</li>
                            <script>a++;</script>
                        @endforeach
                        <script>
                            a=(a*32)-2;
                            document.writeln("<style>");
                            document.writeln("    .navbar-dropdown:hover > .sig{");
                            document.writeln("        height: " + a + "px !important;");
                            document.writeln("        z-index: 100;");
                            document.writeln("    }");
                            document.writeln("</style>");
                        </script>
                    </ul>
                </li>
                <li>{{ HTML::linkWithIcon('about', 'About', 'fa', 'info-circle') }}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <li>{{ HTML::linkWithIcon('login', 'Login', 'fa', 'sign-in', ['id' => 'login-link']) }}</li>
                    <li>{{ HTML::linkWithIcon('register', 'Register', 'fa', 'plus') }}</li>
                @else
                    <li class="dropdown navbar-dropdown" style="width: 160px;">
                        {{ HTML::linkWithIcon('#', Auth::user()->present()->fullname(), 'fa', 'user', ['data-toggle'=>"dropdown"]) }}
                        <ul class="dropdown-menu user">
                            <script>a=0;</script>
                            <li>{{ HTML::linkWithIcon('profile/edit', 'Edit Profile', 'fa', 'pencil') }}</li>
                            <script>a++;</script>
                            @if(Auth::user()->isAdmin())
                                <li>{{ HTML::linkWithIcon('admin', 'Admin Dashboard', 'fa', 'user-md') }}</li>
                                <script>a++;</script>
                            @endif
                            <li>{{ HTML::linkWithIcon('logout', 'Logout', 'fa', 'sign-out') }}</li>
                            <script>a++;</script>
                            <script>
                                a=(a*32)-2;
                                document.writeln("<style>");
                                document.writeln("    .navbar-dropdown:hover > .user{");
                                document.writeln("        height: " + a + "px !important;");
                                document.writeln("        z-index: 99;");
                                document.writeln("    }");
                                document.writeln("</style>");
                            </script>
                        </ul>
                    </li>
                @endif
            </ul>  
        </div>
    </div> 
</div>