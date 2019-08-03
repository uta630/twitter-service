@extends('layouts.app')

@section('content')
<div class="l-container">
    @if (session('status'))
        <div class="u-alert u-alert--success" role="alert">
            {{ var_dump(session('status')) }}
        </div>
    @endif

    <form method="post" action="{{ route('target.create') }}" class="c-settings">
        @csrf

        <h2 class="c-settings__heading fas fa-heart">ターゲットアカウント</h2>

        <div class="c-settings__field">
            <h3 class="c-settings__title c-settings__account">ターゲット一覧</h3>

            @foreach($target as $item)
                @if($loop->first)<ul class="c-settings__items">@endif
                    <li class="c-settings__item"><a href="{{ route('target.delete', $item->id) }}" class="fas fa-trash-alt"></a>&#x40;{{ $item->target_id }}</li>
                @if($loop->last)</ul>@endif
            @endforeach
        </div>

        <div class="c-form__field">
            <label for="target_id" class="c-form__label">ターゲット</label>

            <div class="c-form__input-wrap">
                <input id="target_id" type="text" class="c-form__control @error('target_id') is-invalid @enderror" name="target_id" value="{{ old('target_id') }}" required autocomplete="target_id" autofocus>

                @error('target_id')
                    <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-settings__bottom">
            <a href="{{ route('account.index') }}" class="c-btn">一覧へ</a>
            <button type="submit" class="c-btn c-btn--blue">登録</button>
        </div>
    </form>
</div>
@endsection
