<!DOCTYPE HTML>
<html>
<head>
    <title>{{ trans('layout.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Css -->
    @include('layouts.style')
</head>

<body>
    <!-- header -->
    @include('layouts.partials.header')

    <!-- content -->
    @yield('content')

    <!-- footer -->
    @yield('footer')
    
    <!-- JavaScripts -->
    @include('layouts.script')
</body>
</html>
