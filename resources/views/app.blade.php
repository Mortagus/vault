<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="This is my first small website build with Laravel">
    <meta name="author" content="Benjamin Lemin">

    <title>@yield('title')</title>

    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="/bootstrap-table/src/bootstrap-table.css">

    <link href="/css/app.css" rel="stylesheet">

    @yield('complement-css')

    <script src="/js/app.js"></script>
    <script src="/js/all.js"></script>
</head>

<body>

@yield('top-menu')

@yield('main-container')
</body>
</html>
