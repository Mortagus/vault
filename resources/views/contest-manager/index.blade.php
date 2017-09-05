@extends('app')

@section('title', 'Contest Manager - Index')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        <h1>Contest Manager - Index</h1>

        @include('contest-manager.listing', ['contests' => $contests])
    </div>
@endsection