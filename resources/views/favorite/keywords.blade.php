@extends('layouts.app')

@section('content')
<div class="l-container">
    @if (session('status'))
        <div class="u-alert u-alert--success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="{{ route('favorite.create') }}" class="c-settings">
        @csrf

        <h2 class="c-settings__heading fas fa-heart">自動いいねキーワード登録</h2>

        <div class="c-settings__field">
            <h3 class="c-settings__title c-settings__favorite">登録されているキーワード</h3>
            
            @foreach($favoriteKeywords as $item)
                @if($loop->first)<ul class="l-sidebar__items">@endif
                    <li><a href="{{ route('favorite.keywordDelete', $item->id) }}" class="fas fa-trash"></a>{{ $item->keyword }}</li>
                @if($loop->last)</ul>@endif
            @endforeach
        </div>

        <div class="c-form__field">
            <label for="keyword" class="c-form__label">登録するキーワード</label>

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
