<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'kamitter') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="l-navbar c-navbar">
            <a class="c-navbar__logo" href="{{ url('/') }}">Kamitter</a>

            <ul class="c-navbar__items">
                @guest
                    <li class="c-navbar__item">
                        <a class="c-navbar__link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="c-navbar__item">
                            <a class="c-navbar__link" href="{{ route('register') }}">ユーザー登録</a>
                        </li>
                    @endif
                @else
                    <li class="c-navbar__item">
                        <div class="c-navbar__item--logout" aria-labelledby="navbarDropdown">
                            <a class="c-navbar__link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                ログアウト
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>

        <main class="l-main c-main">
            @yield('content')
        </main>
    </div>
</body>
</html>
