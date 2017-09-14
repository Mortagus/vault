@extends('app')

@section('title', 'Tetris')

@include('partials.top-menu')

@section('complement-css')
    @parent
    <style>
        .centered {
            text-align: center;
        }
    </style>
@endsection

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        <h1>Tetris Exercice (in JS)</h1>
        <hr>
        <div id="score"></div>
        <div class="centered"><canvas id="tetris" width="240" height="400"></canvas></div>
        {{--<script src="/js/tetris/tetrisOriginal.js"></script>--}}
        <script src="/js/tetris/tetris.js"></script>
    </div>
@endsection