@extends('app')

@section('title', 'Exercices')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        <h1>List of Practical Exercices</h1>
        <hr>
        <div id="practices-list">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('flex-index') }}">CSS: Flex</a></li>
                <li class="list-group-item"><a href="{{ route('bootstrap_ex-index') }}">Css: Bootstrap</a></li>
                <li class="list-group-item"><a href="{{ route('jquery_ex-index') }}">Js: jQuery</a></li>
            </ul>
        </div>
    </div>
@endsection