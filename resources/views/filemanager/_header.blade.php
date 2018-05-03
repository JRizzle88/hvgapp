<header id="file-manager-header" style="background-color: none;" class="navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/images/logos/hvgapp-logo.png') }}" /></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/teams') }}">Teams</a></li>
        <li><a href="{{ url('/posts') }}">Articles</a></li>
        <li><a href="{{ url('/forums') }}">Forums</a></li>
      </ul>

      <!--<ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
          <li><a href="{{ url('/auth/login') }}">Login</a></li>
          <li><a href="{{ url('/auth/register') }}">Register</a></li>
        @else
          @if (Auth::user()->isSuperAdmin())
            <li><a href="{{ url('/admin') }}">Admin</a></li>
          @endif
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->first_name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('company', Auth::user()->player_name) }}">My Profile</a></li>
              <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            </ul>
          </li>
        @endif
      </ul>-->
    </div>
  </div>

  <div class="messages container">
    <!-- Informational Flash Messages -->
    @if (Session::has('message'))
      <div class="flash alert alert-info no-margin">
        <p>{{ Session::get('message') }}</p>
      </div>
    @endif
  </div>
</header>