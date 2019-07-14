@extends('layouts.app')

@section('content')
<div class="l-container p-jumbotron__wrap">
    <div class="p-jumbotron">
        <div class="p-jumbotron__inner">
            <h2 class="p-jumbotron__title">Twitter自動集客システム「神ったー」</h2>

            <p class="p-jumbotron__subtitle">TwitterのAPIを使って、自動でターゲットを見つけ出し、自動フォローや自動いいねをしたり、自動ツイートができるWEBサービス</p>
        </div>

        <div class="p-jumbotron__bottom">
            <a href="{{ route('register') }}" class="p-jumbotron__link c-btn c-btn--blue">登録</a>
            <a href="{{ route('login') }}" class="p-jumbotron__link c-btn c-btn--green">ログイン</a>
        </div>
    </div>
</div>
@endsection
