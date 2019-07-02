@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.email') }}" class="l-form c-form">
    @csrf

    <h2 class="c-form__heading">パスワードリセット</h2>

    <div class="c-form__body">
        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

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
                <button type="submit" class="u-btn u-btn--primary">送信</button>
        </div>
    </div>
</form>
@endsection
