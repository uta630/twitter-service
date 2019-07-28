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
            <a href="{{ route('account.user', $loop->index+1) }}" class="p-account__item c-panel">
                <img src="/icon.jpg" alt="{{ $account->account_id }}" class="c-panel__thumb">
                <span class="c-panel__name">&#x40;{{ $account->account_id }}</span>
            </a>

            {{-- 10個未満であればアカウント追加ボタンを表示 --}}
            @if($loop->last && $loop->index+1 < 10)
            <a href="{{ route('account.register') }}" class="p-account__item c-panel c-panel--nondata">
                <i class="c-panel--nondata-icon fas fa-plus-circle fa-6x"></i>
            </a>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
