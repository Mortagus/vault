@extends('app')

@section('title', 'Flex - Index')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        @include('flex.ex1')
        <hr>
        @include('flex.ex2')
        <hr>
        @include('flex.ex3')
        <hr>
        @include('flex.ex4')
        <hr>
        @include('flex.ex5')
        <hr>
        @include('flex.ex6')
        <hr>
        @include('flex.ex7')
        <hr>
        @include('flex.ex8')
        <hr>
        @include('flex.ex9')
        <hr>
        @include('flex.ex10')
        <hr>
        @include('flex.ex11')
        <hr>
        @include('flex.ex12')
    </div>
@endsection