<!DOCTYPE html>
<html>
    <head>
        <title>DigitalMonkey</title>
        <link rel="stylesheet" href="/css/app.css">
        <script src="{{ Helper::env_asset('/js/vendor.js') }}"></script>
        @yield('head')
    </head>
    <body>
        @include('components.header.master')
        @yield('content')
        @include('components.footer')
        @yield('js')
        @include('errors.swal')
    </body>
</html>
