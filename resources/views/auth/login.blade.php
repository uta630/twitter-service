@extends('layouts.app')

@section('content')
<main class="l-container l-container--center">
    <form method="POST" action="{{ route('login') }}" class="c-form">
        @csrf

        <h2 class="c-form__heading">ログイン</h2>

        <div class="c-form__body">
            <div class="c-form__field">
                <label for="email" class="c-form__label">メールアドレス</label>

                <div class="c-form__input-wrap">
                    <input id="email" type="email" class="c-form__control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form__field">
                <label for="password" class="c-form__label">パスワード</label>

                <div class="c-form__input-wrap">
                    <input id="password" type="password" class="c-form__control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form__field">
                <div class="c-form__input-wrap">
                    <div class="c-form__check">
                        <input class="c-form__check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="c-form__check-label" for="remember">次回から自動的でログイン</label>
                    </div>
                </div>
            </div>

            <div class="c-form__field">
                <button type="submit" class="c-btn c-btn--blue">ログイン</button>
            </div>

            <div class="c-form__field">
                @if (Route::has('password.request'))
                <a class="c-form__link" href="{{ route('password.request') }}">パスワードをお忘れですか？</a>
                @endif
            </div>
        </div>
    </form>
</main>
@endsection
