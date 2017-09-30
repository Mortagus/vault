@extends('app')

@section('title', 'Projects')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        <h1>List of project</h1>
        <hr>
        <div id="project-list">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('contest-index') }}">Contest Management</a></li>
                <li class="list-group-item"><a href="{{ route('tetris') }}">Tetris</a></li>
                <li class="list-group-item"><a href="{{ route('random') }}">Random</a></li>
            </ul>
        </div>
    </div>
@endsection