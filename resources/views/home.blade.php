@extends('layouts.app')

@section('content')
<div class="l-container">
    <div class="l-container__header">Dashboard</div>

    <div class="l-container__body">
        @if (session('status'))
            <div class="u-alert u-alert--success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>ログインしました!!!</p>
    </div>
</div>
@endsection
