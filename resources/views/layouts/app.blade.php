<!doctype html>
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

    <style>
    .category-navigation::-webkit-scrollbar {
    display: none;
}
    textarea::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    textarea::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #253b8c; }
    </style>

    <!-- Tailwind -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
</head>
<body style="background-color: #fff;">
    <div id="app">
        @if(Auth()->user())
        <nav class="navbar navbar-expand-xl navbar-light bg-white shadow-sm">
            <div class="container">
                <img style="width:50px" src="{{ asset('img/context.png') }} "/>
                <a class="navbar-brand" style="font-size:18px" href="{{ url('/blog') }}">
                    Conte<span style="font-size:18px;color:#253b8c;font-weight:800">XT</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->is_validate == 1)
                            <li class="nav-item px-3">
                                <a class="text-black hover:no-underline hover:text-blue-600" href="{{ route('postsUsers.index', Auth::user())}}">
                                    <i class="fas fa-bookmark"></i>
                                </a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="text-black hover:no-underline hover:text-blue-600" href="{{ route('postsUsers.create', Auth::user())}}">
                                    <i class="fas fa-file-signature"></i>
                                </a>
                            </li>
                            @if(Auth::user()->name === 'julian ignacio carelli')
                            <li class="nav-item px-3">
                                <a class="text-black hover:no-underline hover:text-blue-600"  href="{{ route('postsValidation.requestPostValidation')}}">Solicitudes para revisar posts</a>
                            </li>
                            @endif
                            @endif
                            <li class="nav-item  px-3 dropdown">
                                <a id="navbarDropdown" class="text-black hover:no-underline hover:text-blue-600 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        <main style="background-color: #fff;">
            @yield('content')
        </main>
    </div>
</body>
</html>
