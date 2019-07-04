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
        <header class="l-header c-header">
            <div class="c-header__row">
                <a class="c-header__logo" href="{{ url('/') }}"><img src="/logo.png" alt="神ったー"></a>

                <input type="checkbox" name="sp-humberger-nav" id="sp-humberger-nav">
                <nav class="l-navbar c-navbar">

                    <ul class="c-navbar__items">
                        @guest
                            <li class="c-navbar__item">
                                <a class="c-navbar__link" href="{{ route('login') }}"><i class="c-navbar__link--icon fas fa-lock"></i>ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="c-navbar__item">
                                    <a class="c-navbar__link" href="{{ route('register') }}"><i class="c-navbar__link--icon far fa-user-circle"></i>ユーザー登録</a>
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
                <label for="sp-humberger-nav" class="l-navbar__humberger"></label>
            </div>
        </header>

        <main class="l-main c-main">
            @yield('content')
        </main>
    </div>
</body>
</html>
