@extends('app')

@section('title', 'Bootstrap - Index')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        @include('bootstrap_ex.ex1')
        <hr>
        @include('bootstrap_ex.ex2')
        <hr>
    </div>
@endsection