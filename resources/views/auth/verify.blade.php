@extends('layouts.app')

@section('content')
<div class="l-container c-container">
    <div class="c-container__header">あなたのメールアドレスを確認してください。</div>

    <div class="c-container__body">
        @if (session('resent'))
            <div class="u-alert u-alert--success" role="alert">
                新しい確認リンクがあなたのメールアドレスに送信されました。
            </div>
        @endif

        続行する前に、確認リンクがあるかどうか電子メールを確認してください。
        メールが届かなかった場合、 <a href="{{ route('verification.resend') }}">こちら</a>をクリック。
    </div>
</div>
@endsection
