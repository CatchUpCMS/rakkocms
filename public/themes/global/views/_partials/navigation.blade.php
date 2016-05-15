<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container-fluid">

<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="/">
	<i class="fa fa-dashboard fa-lg"></i>
		{{ trans('kotoba::general.dashboard') }}
	</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

	<ul class="nav navbar-nav navbar-right">
		@if (Auth::guest())
			<li><a href="/auth/login">{{ trans('kotoba::auth.log_in') }}</a></li>
			<li><a href="/auth/register">{{ trans('kotoba::auth.register') }}</a></li>
		@else
			<li>
				@if (Auth::user()->avatar != null)
					<img
						src="{{ asset(Auth::user()->avatar) }}"
						alt="{{ Auth::user()->email }}"
						class="img-circle nav-profile"
					/>
				@else
					<img
						src="{{ asset('/assets/images/usr.png') }}"
						alt="{{ Auth::user()->email }}"
						class="img-circle nav-profile"
					/>
				@endif
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="/customer/{{ Auth::user()->id }}">
							{{ Lang::choice('kotoba::account.profile', 1) }}
						</a>
					</li>
				<li class="divider"></li>
					<li>
						<a href="/auth/logout">
							{{ trans('kotoba::auth.log_out') }}
						</a>
					</li>
				</ul>
			</li>
		@endif
	</ul>


	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown messages-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img alt="{{ Session::get('locale')  }}" src="{{ asset('/assets/images/famfamfam_flag_icons/png/' . Session::get('locale') . '.png') }}">
				<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				@foreach( $languages as $language)
					<li>
						<a rel="alternate" hreflang="{{ $language->locale }}" href="/language/{{ $language->locale }}">
							<img alt="{{ $language->locale }}" src="{{ asset('/assets/images/famfamfam_flag_icons/png/' . $language->locale . '.png') }}">
							{{{ $language->name }}}
						</a>
					</li>
				@endforeach
			</ul>
		</li>
	</ul>





</div>

</div><!-- ./container-fluid -->
</nav><!-- /nav -->
