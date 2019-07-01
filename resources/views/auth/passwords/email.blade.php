@extends('layouts.app')

@section('content')
<div class="l-container c-container">
    <div class="c-container__header">パスワードリセット</div>

    <div class="c-container__body">
        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="c-form__group">
                <label for="email" class="c-form__label">メールアドレス</label>

                <div class="c-form__input-wrap">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form__group">
                    <button type="submit" class="u-btn u-btn--primary">パスワードリセットリンクを送信します</button>
            </div>
        </form>
    </div>
</div>
@endsection
