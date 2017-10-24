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
  <div id="app">
    <div class="uk-navbar-container tm-navbar-container uk-sticky uk-active" style="position: fixed; top: 0px; width: 1903px;">
      <div class="uk-container uk-container-expand">
        <nav uk-navbar>
          <div class="uk-navbar-left">
            <a href="{{ url('/') }}" class="uk-navbar-item uk-logo">
              {{ config('app.name', 'Laravel') }}
            </a>
          </div>
          <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
              <!-- Authentication Links -->
              @guest
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
              @else
              <li>
                <a href="#">{{ Auth::user()->name }}<span uk-icon="icon: user"></span></a>
                <div uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                  <ul class="uk-nav uk-navbar-dropdown-nav" role="menu">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
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

    <div class="content-padder content-background" style="margin-left: 300px;">@yield('content')</div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
