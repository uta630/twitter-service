@extends('layouts.app')

@section('content')
<div class="l-container l-container--center">
    <div class="c-form">
        <h2 class="c-form__heading">アカウント追加</h2>

        <div class="c-form__body">
            @if (session('status'))
                <div class="u-alert u-alert--success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="c-form__field">
                <p><a href="/auth/twitter" class="c-btn c-btn--blue">ログイン</a></p>
            </div>
            <!-- <div class="c-form__field">
                <p><a href="/auth/twitter/logout" class="c-btn c-btn--red">ログアウト</a></p>
            </div> -->
        </div>
    </div>
</div>
@endsection
