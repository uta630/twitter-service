@extends('layouts.app')

@section('content')
<div class="l-container c-container">
    @if (session('status'))
        <div class="u-alert u-alert--success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="l-primary c-primary c-container__primary">
        <div class="c-primary__contents">
            <h2 class="c-primary__heading fas fa-user-plus">自動フォロー</h2>
            
            <div class="c-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="c-primary__bottom">
                <a href="{{ route('account.follow') }}" class="u-btn u-btn--green">編集</a>
            </div>
        </div>
        
        <div class="c-primary__contents">
            <h2 class="c-primary__heading fas fa-heart">自動いいね</h2>
            
            <div class="c-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="c-primary__bottom">
                <a href="{{ route('account.favorite') }}" class="u-btn u-btn--green">編集</a>
            </div>
        </div>

        <div class="c-primary__contents">
            <h2 class="c-primary__heading fas fa-comment-dots">自動ツイート</h2>
            
            <div class="c-primary__body">
                <p>ここに設定内容が表示されます。</p>
            </div>

            <div class="c-primary__bottom">
                <a href="{{ route('account.tweet') }}" class="u-btn u-btn--green">編集</a>
            </div>
        </div>
    </div>

    <div class="l-sidebar c-sidebar c-container__sidebar">
        <div class="c-sidebar__contents">
            <h3 class="c-sidebar__heading">登録アカウント一覧</h3>

            <ul class="c-sidebar__items">
                <li class="c-sidebar__item"><a href="{{ route('account.index') }}" class="c-sidebar__link">@uta_mr_kiss</a></li>
                <li class="c-sidebar__item"><a href="{{ route('account.index') }}" class="c-sidebar__link">@____uta_____</a></li>
                <li class="c-sidebar__item"><a href="{{ route('account.index') }}" class="c-sidebar__link">@analfxxkers2010</a></li>
            </ul>

            <a href="/" class="c-sidebar__bottom fas fa-plus">アカウント追加</a>
        </div>
    </div>
</div>
@endsection
