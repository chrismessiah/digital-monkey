<!DOCTYPE html>
<html>
    <head>
        <title>My Blog</title>
        <link rel="stylesheet" href="/css/app.css">
        @yield('head')
    </head>
    <body>
        @include('components.header')
        @yield('content')
        @include('components.footer')
    </body>
</html>
