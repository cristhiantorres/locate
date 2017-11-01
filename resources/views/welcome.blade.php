<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Locate</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</style>
</head>
<body>
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <nav class="uk-navbar-container uk-margin" uk-navbar>
            <div class="uk-navbar-center">
                <div class="uk-navbar-center-left"><div>
                    <ul class="uk-navbar-nav">
                        <li><a href="#nosotros">Nostros</a></li>
                        <li><a href="#empresa">Empresa</a></li>
                    </ul>
                </div>
            </div>
            <a class="uk-navbar-item uk-logo" href="#"><img src="/img/locate.png" alt="" width="120px" class="uk-responsive-width"></a>
            <div class="uk-navbar-center-right">
                <div>
                    <ul class="uk-navbar-nav">
                        <li><a href="#contacto">Contactanos</a></li>
                        @if (Route::has('login'))
                        @auth
                        <li><a href="{{ url('/home') }}">{{ Auth::user()->name }}</a></li>
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
                @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
                @endif
            </ul>
        </div>
    </div>
</div>
</nav>
</div>

<div>
    <div class="uk-background-blend-luminosity uk-background-top-right uk-height-large uk-height-1-1 uk-panel uk-flex uk-flex-middle uk-flex-center" style="background-image: url(/img/dark.jpg);">
        <div class="uk-position-top-center">
            <img src="/img/locate.png" alt="">
            <p class="uk-heading-bullet" style="color: #fff">Nosotros le mostramos al mundo tu negocio</p>
        </div>
    </div>
</div>
<div class="uk-container uk-margin">
    <div class="uk-child-width-1-2@s" uk-grid uk-height-match="target: > div > .uk-card">
        <div id="nosotros">
            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-xlarge uk-padding">
                <img src="/img/default.png" alt="">
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-xlarge uk-padding"><div class="uk-dropcap uk-inline">Somos una Agencia Digital conformada por personas innovadoras. No somos una empresa más de tecnología. Desde el 2003 hemos estado ayudando a nuestros clientes a conectarse con sus usuarios através de Sitios Web atractivos, Aplicaciones útiles y Marcas memorables.</div></div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-xlarge uk-padding">
                <div class="uk-dropcap">
                    Ser una empresa diferente significa tener un tipo de cliente diferente. Nuestros clientes no son como los demás clientes.

                    Ellos entienden nuestra cultura y comparten nuestra pasión. Aprecian el hecho que somos colaboradores y ágiles. Saben que el valor real detrás de una idea está en su ejecución y es por eso que confían en nosotros.

                    Ellos comprenden que crear una Marca o lanzar un Sitio Web es la linea de largada y no la linea de meta. Una vez que el producto es lanzado, trabajamos en conjunto para mejorarlo continuamente.
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-xlarge uk-padding"><img src="/img/default.png" alt=""></div>
        </div>
    </div>
</div>
<div class="uk-background-secondary uk-padding uk-panel" id="contacto">
    <div class="uk-container uk-margin">
        <form class="uk-card uk-card-default uk-card-body uk-box-shadow-xlarge uk-padding">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Contacto</legend>

                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Nombre completo">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="email" placeholder="Correo">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Asunto">
                </div>    
                <div class="uk-margin">
                    <textarea class="uk-textarea" rows="5" placeholder="Mensaje"></textarea>
                </div>
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary">Enviar</button>
                </div>  
            </fieldset>
        </form>
    </div>
</div>
<div class="uk-background-default uk-padding uk-panel">
    <div class="uk-float-left">
        <img src="/img/locate.png" width="100px" alt="">
    </div>
    <div class="uk-float-right">
        <p>Desarrollado por <strong>Locate</strong></p>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
