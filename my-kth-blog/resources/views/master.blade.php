<!DOCTYPE html>
<html>
    <head>
        <title>My Blog</title>
        @yield('head')
    </head>
    <body>
        @include('components.header')
        @yield('content')
        {{-- @include('components.footer') --}}
    </body>
</html>
