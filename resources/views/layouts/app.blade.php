<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Researchub</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project.css') }}" rel="stylesheet">


    <style>
        body{
            background-color: #FFFFFF;
        }

        .home-image{
            background-image: url({{url('img/edited-book-case.png') }} );
            background-repeat: no-repeat;
            background-size: cover;
            color: #fff;
        }

        .top-margin{
            margin-top: 30px;
        }

        .big-top-margin{
            margin-top: 50px;
        }

        .center-text{
            text-align: center;
        }

        .top-margin{
            margin-top: 100px;
        }

        .button-top-margin{
            margin-top: 50px;
        }

        .white-text{
            color: #ffffff;
        }

        .big-text{
            font-size: 20px;
        }

        .greybackground{
            background-color:#F5F5F5
        }

        .fontawesome-icon{
            font-size: 60px;
            /* text-align: center; */
        }

        .how-it-works-icon{
            height: 150px;
            width: 131px
        }

        .transbox{
            background-color: rgb(16, 35, 199);
            opacity: 0.6;
        }

        .custom-nav-height{
            font-size: 20px;
        }



    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{--{{ config('Research Blazer', 'Research Blazer') }}--}}
                    <img src="{{asset('img/researchub-logo.png')}}" alt="Researchub logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link custom-nav-height" href="/projects">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-nav-height" href="/tags">Categories</a>
                        </li>
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="/it-reports">IT Reports</a>--}}
                        {{--</li>--}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link custom-nav-height" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link custom-nav-height" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle custom-nav-height" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right custom-nav-height" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="/user/accounts">
                                        Account
                                    </a>
                                    <a class="dropdown-item custom-nav-height" href="{{ route('logout') }}"
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

        <main>

            @yield('content')
        </main>

        <footer class="col-12 col-md-12">

        </footer>
    </div>
</body>
</html>
