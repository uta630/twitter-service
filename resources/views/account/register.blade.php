@extends('layouts.app')

@section('content')
<div class="l-container c-container">
    <div class="c-container__header">Dashboard</div>

    <div class="c-container__body">
        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>アカウント登録ページ!!!</p>
    </div>
</div>
@endsection
