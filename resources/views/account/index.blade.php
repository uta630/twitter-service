@extends('layouts.app')

@section('content')
<div class="l-container">
    <div class="p-account">
        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p class="p-account__heading">{{ $user->name }}</p>

        <div class="p-account__items">
            @foreach($accountList as $account)
            <a href="{{ route('account.user', $account->id) }}" class="p-account__item c-panel">
                <img src="/icon.jpg" alt="{{ $account->twitter_id }}" class="c-panel__thumb">
                <span class="c-panel__name">&#x40;{{ $account->twitter_id }}</span>
            </a>

            {{-- 10個未満であればアカウント追加ボタンを表示 --}}
            @if($loop->last && $loop->index+1 < 10)
            <a href="{{ route('account.register') }}" class="p-account__item c-panel c-panel--nondata">
                <img src="/icon.jpg" alt="アカウント追加" class="c-panel__thumb">
                <span class="c-panel__name">アカウント追加</span>
            </a>
            @endif
            @endforeach
        </div>

        <div class="p-account__bottom">
            <div class="c-btn c-btn--red js-overlay-open">退会</div>
        </div>
    </div>
</div>

<form action="{{ route('account.unsubscribe') }}" method="post">
    @csrf

    <div class="c-overlay js-overlay-target">                
        <div class="c-overlay__inner">
            <div class="c-form">
                <h2 class="c-form__heading">退会する</h2>

                <div class="c-settings__field">
                    <p class="c-form__invalid-feedback c-form__checkbox js-checkbox">この操作は取り消すことができません。</p>
                </div>
                
                <div class="c-settings__bottom">
                    <div class="c-btn js-overlay-close">閉じる</div>
                    <button type="submit" class="c-btn c-btn--red js-checkbox-target" disabled>退会</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
