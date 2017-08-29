@extends('app')

@section('title', 'Jquery - Index')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        @include('jquery_ex.ex1')
        <hr>
    </div>
@endsection