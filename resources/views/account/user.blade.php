@extends('layouts.app')

@section('content')
<div class="l-container">
    <div class="l-primary">
        <h1 class="l-primary__title">&#x40;{{ $account->twitter_id }}</h1>

        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-user-plus">自動フォロー</h2>
            
            <div class="l-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <form action="{{ route('follow.executeFollow', $id) }}" method="post" class="l-primary__bottom">
                @csrf
                <a href="{{ route('follow.index', $id) }}" class="c-btn c-btn--green">編集</a>
                <input type="submit" value="実行" class="c-btn c-btn--blue">
            </form>
        </div>
        
        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-heart">自動いいね</h2>
            
            <div class="l-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="l-primary__bottom">
                <a href="{{ route('favorite.index', $id) }}" class="c-btn c-btn--green">編集</a>
                <a href="{{ route('favorite.index', $id) }}" class="c-btn c-btn--blue">実行</a>
            </div>
        </div>

        <div class="l-primary__contents">
            <h2 class="l-primary__heading fas fa-comment-dots">自動ツイート</h2>
            
            <div class="l-primary__body">
                <p class="l-primary__subheading">・ツイート内容</p>
                <p class="l-primary__desc">{{ $tweet->tweet }}</p>

                <p class="l-primary__subheading">・予約日時</p>
                <p class="l-primary__desc">{{ $tweet->release }}</p>
            </div>

            <form action="{{ route('tweet.executeTweet', $id) }}" method="post" class="l-primary__bottom">
                @csrf
                <a href="{{ route('tweet.index', $id) }}" class="c-btn c-btn--green">編集</a>
                <input type="submit" value="実行" class="c-btn c-btn--blue">
            </form>
        </div>

        <div class="l-primary__bottom">
            <div class="c-form__field">
                <div class="c-btn c-btn--red js-overlay-open">アカウント削除</div>
            </div>
        </div>
    </div>

    <div class="l-sidebar">
        <div class="l-sidebar__contents">
            <h3 class="l-sidebar__heading">キーワード</h3>

            <a href="{{ route('follow.keywords') }}" class="l-sidebar__bottom fas fa-plus">フォローキーワード追加</a>
            <a href="{{ route('favorite.keywords') }}" class="l-sidebar__bottom fas fa-plus">いいねキーワード追加</a>
        </div>
        
        <div class="l-sidebar__contents">
            <h3 class="l-sidebar__heading">ターゲットアカウント</h3>

            <a href="{{ route('target.index') }}" class="l-sidebar__bottom fas fa-plus">ターゲット追加</a>
        </div>
        
        <div class="l-sidebar__contents">
            <h3 class="l-sidebar__heading"><a href="{{ route('account.index') }}">ご利用アカウントID</a></h3>

            @foreach($accountList as $item)
                @if($loop->first)<ul class="l-sidebar__items">@endif
                    <li class="l-sidebar__item"><a href="/account/{{ $item->id }}" class="l-sidebar__link @if($id == $item->id) is-active @endif">&#x40;{{ $item->twitter_id }}</a></li>
                @if($loop->last)</ul>@endif
            @endforeach

            <a href="{{ route('account.register') }}" class="l-sidebar__bottom fas fa-plus">アカウント追加</a>
        </div>
    </div>
</div>

<form action="{{ route('account.accountDelete', $id) }}" method="post" class="c-overlay js-overlay-target">
    @csrf

    <div class="c-overlay__inner">
        <div class="c-form">
            <h2 class="c-form__heading">アカウントを削除する</h2>

            <div class="c-settings__field">
                <p class="c-form__invalid-feedback c-form__checkbox js-checkbox">この操作は取り消すことができません。</p>
            </div>
            
            <div class="c-settings__bottom">
                <div class="c-btn js-overlay-close">閉じる</div>
                <button type="submit" class="c-btn c-btn--red js-checkbox-target" disabled>アカウント削除</button>
            </div>
        </div>
    </div>
</form>
@endsection
