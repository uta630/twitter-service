@extends('layouts.app')

@section('content')
<div class="container">
    <div class="c-container__header">ログイン</div>

    <div class="c-container__body">
        <form method="POST" action="{{ route('login') }}" class="l-form c-form">
            @csrf

            <div class="c-form__group">
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

            <div class="c-form__group">
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

            <div class="c-form__group">
                <div class="c-form__input-wrap">
                    <div class="c-form__check">
                        <input class="c-form__check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="c-form__check-label" for="remember">次回から自動的でログイン</label>
                    </div>
                </div>
            </div>

            <div class="c-form__group">
                <button type="submit" class="u-btn u-btn--primary">ログイン</button>

                @if (Route::has('password.request'))
                    <a class="u-btn u-btn--link" href="{{ route('password.request') }}">パスワードをお忘れですか？</a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
