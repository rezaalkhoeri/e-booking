<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<link href="{{ url('css/default.css') }}" rel="stylesheet">

<body>
    @include('includes.header')

    @yield('content')

    @include('includes.footer')
    @yield('scripts')
</body>

</html>