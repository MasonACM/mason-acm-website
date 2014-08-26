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
			<ul class="nav navbar-nav">
				@if ($activeLanParty)
					<li class="{{ active('lanparty') }}">
						<a href="{{ URL::route('lanparty.register') }}">
							<i class="fa fa-gamepad"></i> LAN Party
						</a>
					</li>
				@endif
				<li class="{{ active('forum') }}">
					<a href="{{ URL::route('forum.index') }}">
						<i class="fa fa-comment"></i> Forum
					</a>
				</li>
				<li class="{{ active('vb') }}">
					<a href="{{ URL::route('vb') }}">
						<i class="fa fa-cloud-download"></i> Download VB6
					</a>
				</li>
				<li class="{{ active('special-interest-groups') }} dropdown dropdown-open">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-users"></i>&nbsp; Special Interest Groups &nbsp;<i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu" role="menu">
					   @foreach($groups as $group)
							<li>
								<a href="{{ $group->url }}">
									{{ $group->title }}
								</a>
							</li>
					   @endforeach
					</ul>
				</li>
			</ul>
			<ul class="navbar-nav navbar-right nav">
				@if (Auth::guest())
					<li class="{{ active('login') }}">
						<a href="{{ URL::route('login') }}">
							<i class="fa fa-sign-in"></i> Login
						</a>
					</li>
					<li class="{{ active('register') }}">
						<a href="{{ URL::route('register') }}">
							<i class="fa fa-plus"></i> Register
						</a>
					</li>
				@else
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-caret-down fa-fw"></i> {{ Auth::user()->present()->fullName() }}
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ URL::route('profile.edit') }}"><i class="fa fa-user fa-fw"></i> Profile</a></li>
							@if(Auth::admin())
								<li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-flag fa-fw"></i> Admin Panel</a></li>
							@endif
							<li><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</div>