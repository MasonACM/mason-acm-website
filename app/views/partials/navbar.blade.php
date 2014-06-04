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
                <li class="navbar-dropdown">{{ HTML::linkWithIcon('sig', 'Special Interest Groups', 'fa', 'group') }}
                    <ul>
                        @foreach(SIG::all() as $sig)      
                            <li>{{ HTML::linkWithIcon('sig/' . $sig->url, $sig->name, 'fa', $sig->icon) }}</li>
                        @endforeach
                    </ul>
                </li>
                <li>{{ HTML::linkWithIcon('about', 'About', 'fa', 'info-circle') }}</li>
                <li>{{ HTML::linkWithIcon('vb', 'Download VB6', 'fa', 'cloud-download') }}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <li>{{ HTML::linkWithIcon('login', 'Login', 'fa', 'sign-in', ['id' => 'login-link']) }}</li>
                    <li>{{ HTML::linkWithIcon('register', 'Register', 'fa', 'plus') }}</li>
                @else
                    <li class="navbar-dropdown" style="width: 150px;"><a><i class="fa fa-user"></i>&nbsp;&nbsp;{{ Auth::user()->present()->fullname() }}</a>
                        <ul>
                            <li>{{ HTML::linkWithIcon('profile/edit', 'Edit Profile', 'fa', 'pencil') }}</li> 
                            @if(Auth::user()->isAdmin())
                                <li>{{ HTML::linkWithIcon('admin', 'Admin Dashboard', 'fa', 'user-md') }}</li> 
                            @endif
                            <li>{{ HTML::linkWithIcon('logout', 'Logout', 'fa', 'sign-out') }}</li> 
                        </ul>
                    </li>
                @endif
            </ul>  
        </div>
    </div> 
</div>