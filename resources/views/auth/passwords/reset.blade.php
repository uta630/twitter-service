@extends('layouts.app')

@section('content')
<div class="container">
    <div class="c-container__header">パスワードリセット</div>

    <div class="c-container__body">
        <form method="POST" action="{{ route('password.update') }}" class="l-form c-form">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="c-form__field">
                <label for="email" class="c-form__label">メールアドレス</label>

                <div class="c-form__input-wrap">
                    <input id="email" type="email" class="c-form__control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                    <input id="password" type="password" class="c-form__control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form__field">
                <label for="password-confirm" class="c-form__label">パスワード再入力</label>

                <div class="c-form__input-wrap">
                    <input id="password-confirm" type="password" class="c-form__control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="c-form__field">
                <button type="submit" class="u-btn u-btn--primary">パスワードをリセットする</button>
            </div>
        </form>
    </div>
</div>
@endsection
