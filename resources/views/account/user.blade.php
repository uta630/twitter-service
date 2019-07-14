@extends('layouts.app')

@section('content')
<div class="l-container">
    @if (session('status'))
        <div class="u-alert u-alert--success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="l-primary__primary">
        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-user-plus">自動フォロー</h2>
            
            <div class="l-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="l-primary__bottom">
                <a href="{{ route('account.follow') }}" class="c-btn c-btn--green">編集</a>
            </div>
        </div>
        
        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-heart">自動いいね</h2>
            
            <div class="l-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="l-primary__bottom">
                <a href="{{ route('account.favorite') }}" class="c-btn c-btn--green">編集</a>
            </div>
        </div>

        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-comment-dots">自動ツイート</h2>
            
            <div class="l-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="l-primary__bottom">
                <a href="{{ route('account.tweet') }}" class="c-btn c-btn--green">編集</a>
            </div>
        </div>
    </div>

    <div class="l-sidebar">
        <div class="l-sidebar__contents">
            <h3 class="l-sidebar__heading">登録アカウント一覧</h3>

            <ul class="l-sidebar__items">
                <li class="l-sidebar__item"><a href="{{ route('account.index') }}" class="l-sidebar__link">@uta_mr_kiss</a></li>
                <li class="l-sidebar__item"><a href="{{ route('account.index') }}" class="l-sidebar__link">@____uta_____</a></li>
                <li class="l-sidebar__item"><a href="{{ route('account.index') }}" class="l-sidebar__link">@analfxxkers2010</a></li>
            </ul>

            <a href="/" class="l-sidebar__bottom fas fa-plus">アカウント追加</a>
        </div>
    </div>
</div>
@endsection
