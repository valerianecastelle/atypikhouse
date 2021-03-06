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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=East+Sea+Dokdo|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/video.css') }}">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <style>
    .atypikfooter{
        margin-top: 0.7rem;
        background-color: #f8f9fa;
        font-family: 'Roboto';
        letter-spacing: 0.2rem;
        font-size: 0.7rem;
        text-transform: uppercase;
        flex-direction: row;
        padding: 0.4rem;  
        text-align: center;
        width: 100%;
        position: absolute;
        bottom: 3rem;
    }


    .atypiklegal{
        margin-top: 0.7rem;
        color:#f8f9fa;
        background-color: transparent;
        font-family: 'Roboto';
        letter-spacing: 0.2rem;
        font-size: 0.7rem;
        text-transform: uppercase;
        flex-direction: row;
        padding: 0.4rem;  
        text-align: center;
        width: 100%;
        position: absolute;
        bottom: 1rem;
    }
    </style>
</head>
<body>
    <div id="app">
    <nav class="atypiktools">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                    <a href="https://www.facebook.com/voyageavecatypik"><div class="facebook"></div></a>
                    <a href="https://www.instagram.com/atypik_house_voyage"><div class="instagram"></div></a>
                    </div>
                    <div class="col-8 verti-center">
                    Découvrez des logements adaptés à tous types de voyage
                    </div>

                    <div class="col-2 verti-center">
                    @guest
                        <div class="login"></div>
                        <a class="atypiklinks" href="{{ route('login') }}">Connexion</a>
                    @else
                        <div class="login"></div>
                        <a class="atypiklinks" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Déconnexion</a>
                    @endguest
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg atypikmenu" style="margin-bottom: 40px;">
            <div class="container">
                <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h1>Atypik <span class="roboto">House</span></h1> 
                    </a>
                
                <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"> Dernières trouvailles </a></li>
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"> Devenir hôte </a></li>
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"> M'inscrire </a></li>
                        @else
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"> Dernières trouvailles </a></li>
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"> Devenir hôte </a></li>
                            <li class="nav-item">
                                <a href="{{ route('habitat.index') }}" class="nav-link"> Habitats </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->pseudo }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                    <li class="dropdown-item">
                                        <a href="{{ route('profil.index', auth()->user()->id) }}"> Mon profil </a>
                                    </li>

									<li class="dropdown-item">
                                        <a href="{{ route('reservation.show', auth()->user()->id) }}"> Mes réservations </a>
									</li> 

                                    <li class="dropdown-item">
                                        <a href="{{ route('habitat.create') }}"> Enregistrer un habitat </a>

                                    </li>
                                <!-- Permet d'afficher uniquement cette page pour les gérant -->
                                 @gerant
                                    <li class="dropdown-item">
                                        <a href="{{ route('profil.gerant') }}"> Gestion du site </a>
                                    </li>
                                 @endgerant
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')


        <nav class="atypikfooter">
            <div class="container">
                <div class="row">
                    <div class="col-3 verti-center horiz-center">
                        <a href="{{ route('about') }}">A propos</a>
                    </div>
                    <div class="col-3 verti-center horiz-center">
                        <a href="{{ route('legal') }}">Mentions légales</a>
                    </div>
                    <div class="col-3 verti-center horiz-center">
                        <a href="{{ route('cgv') }}">CGV</a>
                    </div>
                    <div class="col-3 verti-center horiz-center">
                        <a href="{{ route('help') }}">Aide</a>
                    </div>
                </div>
            </div>
        </nav>

        <nav class="atypiklegal">
            <div class="container">
                <div class="row">
                    <div class="col-12 verti-center horiz-center">
                        © 2018 - ATYPIK HOUSE - Tous droits réservés -&nbsp;  <a href="{{ route('cgu') }}"> conditions d'utilisation</a>
                    </div>
                </div>
            </div>
        </nav>

    </div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/video.js') }}"></script>
</body>
</html>
