@extends('app')

@section('title', 'Contest Manager - Index')

@include('partials.top-menu')

@section('main-container')
    <div class="container" style="padding: 90px 0;">
        <h1>Contest Manager - Show</h1>

        <p>contest name = {{ $contest->name }}</p>

        {{--<p>here the questions related to this contest: {{ $contest->questions()->all() }}</p>--}}

        @foreach ($contest->questions as $question)
            {{ $question->text_default }}
        @endforeach
    </div>
@endsection