@extends('layouts.app')

@section('content')
<div class="l-container">

    <form method="post" action="{{ route('tweet.reservation', $id) }}" class="c-settings">
        @csrf

        <h2 class="c-settings__heading fas fa-comment-dots">自動ツイート</h2>

        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="c-settings__field">
            <h3 class="c-settings__title c-settings__account">ご利用アカウント</h3>
            <p class="c-settings__text">&#x40;{{ $account->twitter_id }}</p>
        </div>

        <div class="c-form__field">
            <label for="tweet" class="c-form__label">・ツイート内容</label>

            <div class="c-form__input-wrap">
                <input id="tweet" type="text" class="c-form__control @error('tweet') is-invalid @enderror" name="tweet" value="{{ old('tweet', empty($tweet) ? '' : $tweet->tweet) }}" required autocomplete="tweet" autofocus>

                @error('tweet')
                    <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-form__field">
            <label for="release" class="c-form__label">・予約日時</label>

            <div class="c-form__input-wrap">
                <input id="release" type="text" class="c-form__control @error('release') is-invalid @enderror" name="release" value="{{ old('release', empty($tweet) ? '' : $tweet->release) }}" required autocomplete="release">

                @error('release')
                    <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-settings__bottom">
            <a href="{{ route('account.user', $id) }}" class="c-btn">一覧へ</a>
            <button type="submit" class="c-btn c-btn--blue">登録</button>
        </div>
    </form>
</div>
@endsection
