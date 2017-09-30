@extends('app')

@section('title', 'Random - Index')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        @include('random.movie-listing')
    </div>
@endsection