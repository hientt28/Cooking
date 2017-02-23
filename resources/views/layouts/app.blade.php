<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>{{ trans('layout.title') }}</title>
    @include('layouts.styles')
</head>
<body>
    @include('layouts.partials.header')
    @if (Auth::check() && Auth::user()->isAdmin())
        @include('layouts.partials.sidebar')
    @endif

    @if (!Auth::guest())
        <div id="page-wrapper">
            @yield('content')
        </div>
    @else
        @yield('content')
    @endif

    @include('layouts.scripts')
    @yield('script')
</body>
</html>
