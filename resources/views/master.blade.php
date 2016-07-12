<!DOCTYPE html>
<html>
    <head>
        <title>My Blog</title>
        <link rel="stylesheet" href="/css/app.css">
        <script src="{{ secure_asset('/js/vendor.js') }}"></script>
        @yield('head')
    </head>
    <body>
        @include('components.header')
        @yield('content')
        @include('components.footer')
        @yield('js')
        @include('errors.swal')
    </body>
</html>
