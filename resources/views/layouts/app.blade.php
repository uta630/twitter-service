<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='noindex,follow' />

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
        <header class="l-header">
            <div class="l-header__row">
                <a class="l-header__logo" href="{{ url('/') }}"><img src="/logo.png" alt="神ったー"></a>

                <input type="checkbox" name="sp-humberger-nav" id="sp-humberger-nav" class="c-navbar__checkbox">
                <nav class="c-navbar">

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
                <label for="sp-humberger-nav" class="c-navbar__humberger"></label>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>
