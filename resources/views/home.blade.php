@extends('layouts.app')

@section('content')
<div class="l-container">
    <div class="p-account">
        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- <h2 class="p-account__heading">アカウント一覧</h2> -->

        <div class="p-account__items">
            <a href="{{ route('account.user') }}" class="p-account__item c-panel">
                <img src="/icon.jpg" alt="サムネ" class="c-panel__thumb">
                <span class="c-panel__name">@TwitterJP</span>
            </a>
            
            <a href="{{ route('account.user') }}" class="p-account__item c-panel">
                <img src="/icon.jpg" alt="サムネ" class="c-panel__thumb">
                <span class="c-panel__name">@MomentsJapan</span>
            </a>
            
            <a href="{{ route('account.user') }}" class="p-account__item c-panel">
                <img src="/icon.jpg" alt="サムネ" class="c-panel__thumb">
                <span class="c-panel__name">@TwitterMediaJP</span>
            </a>
            
            <a href="{{ route('account.user') }}" class="p-account__item c-panel">
                <img src="/icon.jpg" alt="サムネ" class="c-panel__thumb">
                <span class="c-panel__name">@twitcasting_jp</span>
            </a>
            
            <a href="{{ route('account.register') }}" class="p-account__item c-panel c-panel--nodata fas fa-plus-circle fa-6x"></a>
        </div>
    </div>
</div>
@endsection
