<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/1f03899c89.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-lg ">
            <div class="container">
                <a class="navbar-brand" href="{{URL::to('/')}}"><strong>Peso App</strong></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="color: #152b5b;">☰
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link{{request()->is('home') ? ' active' : ''}}" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    @auth
                    <a class="nav-link{{request()->is('mypost') ? ' active' : ''}}" href="{{ route('mypost') }}">My Post <span class="sr-only">(current)</span></a>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link{{request()->is('login') ? ' active' : ''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link{{request()->is('register') ? ' active' : ''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/chatify">{{ __('My Chat') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{request()->is('notifikasi') ? ' active' : ''}}" href="{{ route('notifikasi') }}">{{ __('Notifikasi') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('jumbotron')

            <div class="py-4">
                @yield('content')
            </div>
        </main>


        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-weight-bold">PesoApp</p>
                        <p>Solusi service, tidak perlu<br>susah cari teknisi</p>
                    </div>
                    <div class="col-md-4">
                        <p class="font-weight-bold">Explore Us</p>
                        <a href="" class="text-dark">About</a><br>
                        <a href="" class="text-dark">Privacy police</a><br>
                        <a href="" class="text-dark">Terms & conditions</a><br>
                    </div>
                    <div class="col-md-2">
                        <p class="font-weight-bold">Getting Touch</p>
                        <p>suport@pesoapp.id<br>021 - 3346 - 7577<br>PesoApp, Bandung</p>
                    </div>
                </div>
            </div>

            <p class="text-center pt-4">Copyright &copy; 2021•All rights reserved•PesoApp</p>
        </footer>
    </div>

     <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>
</html>
