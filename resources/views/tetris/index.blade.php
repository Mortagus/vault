@extends('app')

@section('title', 'Tetris')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        <canvas id="tetris" width="240" height="400"></canvas>
        <script src="tetris.js"></script>
    </div>
@endsection