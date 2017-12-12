<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app" class="uk-offcanvas-content">
    <div class="uk-navbar-container tm-navbar-container uk-sticky uk-active" style="position: fixed; top: 0px; width: 1903px;">
      <div class="uk-container uk-container-expand">
        <nav uk-navbar>
          <div class="uk-navbar-left">
            @auth
            <button type="button" class="uk-navbar-toggle" uk-toggle="target: #offcanvas-overlay" uk-navbar-toggle-icon ></button>
            @endauth
            <a href="{{ url('/') }}" class="uk-navbar-item uk-logo">
              <!-- {{ config('app.name', 'Laravel') }} -->
              <img width="110px" src="/img/locate.png" alt="">
            </a>
          </div>
          <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
              <!-- Authentication Links -->
              @guest
              <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>
              <li><a href="{{ route('register') }}">Registrate</a></li>
              @else
              <li>
                <a href="#">{{ Auth::user()->name }}<span uk-icon="icon: user"></span></a>
                <div uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                  <ul class="uk-nav uk-navbar-dropdown-nav" role="menu">
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </nav>
      </div>
    </div>
    @auth
    <div id="offcanvas-overlay" uk-offcanvas="mode: push; overlay: true" class="uk-background-default">
      <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
          <li class="uk-active"><a href="{{ route('home') }}">Dashboard</a></li>
        </ul>
      </div>
    </div>
    <div class="uk-sticky-placeholder" style="height: 80px;margin: 0px;"></div>
    <div class="uk-container">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="uk-section-small">
        @yield('content')
      </div>
    </div>
    @else
    @yield('content')
    @endauth
  </div>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('javascript')
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD-rugQ05BEqG1ljxLH_RlNsarBdWekUM&libraries=places"></script>
</body>
</html>
