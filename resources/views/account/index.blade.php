@extends('layouts.app')

@section('content')
<div class="l-container">
    <div class="p-account">
        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="p-account__items">
            @foreach($accountList as $account)
            <a href="{{ route('account.user', $account->id) }}" class="p-account__item c-panel">
                <img src="/icon.jpg" alt="{{ $account->account_id }}" class="c-panel__thumb">
                <span class="c-panel__name">&#x40;{{ $account->account_id }}</span>
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

        <form action="{{ route('account.unsubscribe') }}" method="post">
            @csrf

            <div class="c-form__field">
                <button type="submit" class="c-btn c-btn--red">退会</button>
            </div>
        </form>
    </div>
</div>
@endsection
