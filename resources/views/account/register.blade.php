@extends('layouts.app')

@section('content')
<div class="l-container l-container--center">
    <form method="POST" action="{{ route('account.create') }}" class="c-form">
        @csrf

        <h2 class="c-form__heading">アカウント追加</h2>

        <div class="c-form__body">
            @if (session('status'))
                <div class="u-alert u-alert--success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="c-form__field">
                <label for="account_id" class="c-form__label">アカウントID</label>

                <div class="c-form__input-wrap">
                    <input id="account_id" type="text" class="c-form__control @error('account_id') is-invalid @enderror" name="account_id" value="{{ old('account_id') }}" required autocomplete="account_id" autofocus>

                    @error('account_id')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form__field">
                <button type="submit" class="c-btn c-btn--blue">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection
