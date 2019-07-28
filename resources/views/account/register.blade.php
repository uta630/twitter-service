@extends('layouts.app')

@section('content')
<div class="l-container l-container--center">
    <form method="POST" action="" class="c-form">
        @csrf

        <h2 class="c-form__heading">アカウント追加</h2>

        <div class="c-form__body">
            <div class="c-form__field">
                <label for="name" class="c-form__label">名前</label>

                <div class="c-form__input-wrap">
                    <input id="name" type="text" class="c-form__control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form__field">
                <label for="email" class="c-form__label">メールアドレス</label>

                <div class="c-form__input-wrap">
                    <input id="email" type="email" class="c-form__control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                <button type="submit" class="c-btn c-btn--blue">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection
