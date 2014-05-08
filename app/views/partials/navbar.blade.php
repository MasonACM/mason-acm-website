<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                <!--<object type="image/svg+xml" data="{{ URL::to('img/MasonACM_icon.svg') }}" width=26 height=18></object>-->
                {{ HTML::linkWithCustomIcon('', 'Mason ACM', 'logo') }}
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(LAN_Party::hasActiveParty())
                    <li>{{ HTML::linkWithIcon('lanparty', 'LAN Party', 'gamepad') }}</li>
                @endif
                <li>{{ HTML::linkWithIcon('forum', 'Forum', 'comments-o') }}</li>
                <li>{{ HTML::linkWithIcon('tutorials', 'Tutorials', 'file-text') }}</li>
                <li>{{ HTML::linkWithIcon('sig', 'Special Interest Groups', 'group') }}
                    <ul>
                        @foreach(SIG::all() as $sig)      
                            <li>{{ HTML::linkWithIcon('sig/' . $sig->url, $sig->name, $sig->icon) }}</li>
                        @endforeach
                    </ul>
                </li>
                <li>{{ HTML::linkWithIcon('about', 'About', 'info-circle') }}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <li>{{ HTML::linkWithIcon('login', 'Login', 'sign-in', ['id' => 'login-link']) }}</li>
                    <li>{{ HTML::linkWithIcon('register', 'Register', 'plus') }}</li>
                @else
                    <li><a><i class="fa fa-user"></i>&nbsp;&nbsp;{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
                        <ul>
                            <li>{{ HTML::linkWithIcon('edit_user', 'Edit Information', 'pencil') }}</li> 
                            @if(Auth::user()->isAdmin())
                                <li>{{ HTML::linkWithIcon('admin', 'Admin Settings', 'user-md') }}</li> 
                            @endif
                            <li>{{ HTML::linkWithIcon('logout', 'Logout', 'sign-out') }}</li> 
                        </ul>
                    </li>
                @endif
            </ul>  
        </div>
    </div> 
</div>