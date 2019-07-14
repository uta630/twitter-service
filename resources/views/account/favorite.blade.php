@extends('layouts.app')

@section('content')
<div class="l-container">
    @if (session('status'))
        <div class="u-alert u-alert--success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="c-settings__settings">
        <h2 class="c-settings__heading fas fa-heart">自動いいね</h2>

        <div class="c-settings__field">
            <h3 class="c-settings__title c-settings__account">アカウント名</h3>
            <p class="c-settings__text">@exampleName</p>
        </div>

        <div class="c-settings__field">
            <h3 class="c-settings__title c-settings__favorite">自動いいねキーワード登録</h3>
            <p>ターゲットとなるキーワードの登録</p>
        </div>

        <div class="c-settings__bottom">
            <a href="{{ route('account.user') }}" class="c-btn c-btn--blue">登録</a>
        </div>
    </div>
</div>
@endsection
