@extends('layouts.app')

@section('content')
<main class="l-container l-container--center c-container">
    <div class="c-container__header">Dashboard</div>

    <div class="c-container__body">
        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>いいね関連のページ!!!</p>
    </div>
</main>
@endsection
