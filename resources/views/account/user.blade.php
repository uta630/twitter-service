@extends('layouts.app')

@section('content')
<div class="l-container">
    @if (session('status'))
        <div class="u-alert u-alert--success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="l-primary">
        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-user-plus">自動フォロー</h2>
            
            <div class="l-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="l-primary__bottom">
                <a href="{{ route('follow.keywords') }}" class="c-btn c-btn--blue">キーワード登録</a>
                <a href="{{ route('follow.index') }}" class="c-btn c-btn--green">編集</a>
            </div>
        </div>
        
        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-heart">自動いいね</h2>
            
            <div class="l-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="l-primary__bottom">
                <a href="{{ route('favorite.keywords') }}" class="c-btn c-btn--blue">キーワード登録</a>
                <a href="{{ route('favorite.index') }}" class="c-btn c-btn--green">編集</a>
            </div>
        </div>

        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-comment-dots">自動ツイート</h2>
            
            <div class="l-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="l-primary__bottom">
                <a href="{{ route('tweet.index') }}" class="c-btn c-btn--green">編集</a>
            </div>
        </div>
    </div>

    <div class="l-sidebar">
        <div class="l-sidebar__contents">
            <h3 class="l-sidebar__heading"><a href="{{ route('account.index') }}">アカウント</a></h3>

            <ul class="l-sidebar__items">
                <li class="l-sidebar__item"><a href="{{ route('account.user') }}" class="l-sidebar__link">@TwitterJP</a></li>
                <li class="l-sidebar__item"><a href="{{ route('account.user') }}" class="l-sidebar__link">@MomentsJapan</a></li>
                <li class="l-sidebar__item"><a href="{{ route('account.user') }}" class="l-sidebar__link">@TwitterMediaJP</a></li>
                <li class="l-sidebar__item"><a href="{{ route('account.user') }}" class="l-sidebar__link">@twitcasting_jp</a></li>
            </ul>

            <a href="{{ route('account.register') }}" class="l-sidebar__bottom fas fa-plus">アカウント追加</a>
        </div>
    </div>
</div>
@endsection
