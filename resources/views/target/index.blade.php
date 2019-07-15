@extends('layouts.app')

@section('content')
<div class="l-container">
    @if (session('status'))
        <div class="u-alert u-alert--success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="" class="c-settings">
        <h2 class="c-settings__heading fas fa-heart">ターゲットアカウント</h2>

        <div class="c-settings__field">
            <h3 class="c-settings__title c-settings__account">ターゲット一覧</h3>
            <p class="c-settings__text">@exampleName</p>
            <p class="c-settings__text">@exampleName</p>
            <p class="c-settings__text">@exampleName</p>
            <p class="c-settings__text">@exampleName</p>
            <p class="c-settings__text">@exampleName</p>
        </div>

        <div class="c-settings__bottom">
            <a href="{{ route('account.user') }}" class="c-btn c-btn--blue">登録</a>
        </div>
    </form>
</div>
@endsection
