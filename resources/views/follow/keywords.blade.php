@extends('layouts.app')

@section('content')
<div class="l-container">
    @if (session('status'))
        <div class="u-alert u-alert--success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="{{ route('follow.create') }}" class="c-settings">
        @csrf

        <h2 class="c-settings__heading fas fa-heart">自動フォローキーワード登録</h2>

        <div class="c-settings__field">
            <h3 class="c-settings__title c-settings__follow">登録されているキーワード</h3>

            @foreach($followKeywords as $item)
                @if($loop->first)<ul class="l-sidebar__items">@endif
                    <p>{{ $item->keyword }}</p>
                @if($loop->last)</ul>@endif
            @endforeach
        </div>

        <div class="c-form__field">
            <label for="keyword" class="c-form__label">キーワード</label>

            <div class="c-form__input-wrap">
                <input id="keyword" type="text" class="c-form__control @error('keyword') is-invalid @enderror" name="keyword" value="{{ old('keyword') }}" required autocomplete="keyword" autofocus>

                @error('keyword')
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
