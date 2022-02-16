<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .avatar {
            width: 2.5vw;
        }
    </style>


    <script>
        async function alterna_like(element) {
            try {

                if (element.classList[0] == "far") {
                    const response = await fetch("/imagen/like/"+element.getAttribute("data-id"))
                                    .then(function (response) { 
                                        if (!response.ok) throw response.status;
                                        return response.json();
                                        })
                                    .then(function (responseJSON) {
                                            element.textContent = responseJSON.numero;
                                            element.classList.toggle("far");
                                            element.classList.toggle("fas");
                    });
                } else {
                    const response = await fetch("/imagen/quitarLike/"+element.getAttribute("data-id"))
                                    .then(function (response) { 
                                        if (!response.ok) throw response.status;
                                        return response.json();
                                        })
                                    .then(function (responseJSON) {
                                            element.textContent = responseJSON.numero;
                                            element.classList.toggle("fas");
                                            element.classList.toggle("far");
                    });
                }
            } catch(error) {
                console.log(error);
            };
        };

        async function tiempoImagen(element) {
            try {
                debugger
                const response = await fetch("/tiempoPublicacion/"+element.getAttribute("data-id"))
                                    .then(function (response) { 
                                        if (!response.ok) throw response.status;
                                        return response.json();
                                        })
                                    .then(function (responseJSON) {
                                        debugger
                                        element.textContent = responseJSON.texto;
                                    });
            } catch (error) {
                console.log(error);
            };
        };

        async function tiempoUsuario(element) {
            debugger
            try {
                const response = await fetch("/tiempoUsuario/"+element.getAttribute("data-id"))
                                    .then(function (response) { 
                                        if (!response.ok) throw response.status;
                                        return response.json();
                                        })
                                    .then(function (responseJSON) {
                                        debugger
                                        element.textContent = responseJSON.texto;
                                    });
            } catch (error) {
                console.log(error);
            };
        };
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="nav-link d-lg-flex align-items-center" href="{{ route('inicio')}}">Inicio</a>
                            <a class="nav-link d-lg-flex align-items-center" href="{{ route('inicio')}}">Gente</a>
                            <a class="nav-link d-lg-flex align-items-center" href="{{ route('imagesLike', array('id' => Auth::user()->id))}}">Favoritas</a>
                            <a class="nav-link d-lg-flex align-items-center" href="{{ route('createImage')}}">Subir imagen</a>
                            <img class="rounded-circle avatar d-lg-flex align-items-center" src="{{ Auth::user()->image != 'null' ? "/private/" .  Auth::user()->image : '/storage/anon.png' }}">

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nick }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('userperfil', array('id' => Auth::user()->id )) }}">Mi perfil</a>
                                    <a class="dropdown-item" href="{{ route('userconfiguracion', array('id' => Auth::user()->id)) }}">Configuración</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
