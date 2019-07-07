@extends('layouts.app')

@section('content')
<main class="l-container l-container--center c-container">
    <form method="POST" action="{{ route('password.update') }}" class="l-form c-form">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        
        <h2 class="c-form__heading">パスワードリセット</h2>
        
        <div class="c-form__body">
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
        </div>
    </form>
</main>
@endsection
