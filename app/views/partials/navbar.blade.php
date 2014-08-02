<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <b>{{ HTML::link('/', 'Mason ACM', ['class' => 'navbar-brand']) }}</b>
        </div>
        <div class="collapse navbar-collapse">
            {{ Navigation::create('MasonACM\Navigation\MainNavigation') }}            
            <div class="pull-right">
                @if(Auth::guest())
                    {{ Navigation::create(['login' => ['icon' => 'sign-in'], 'register' => ['icon' => 'plus']]) }}
                @else
                    {{ Navigation::create(['logout' => ['icon' => 'sign-out']]) }}
                @endif
            </div>
        </div>
    </div> 
</div>