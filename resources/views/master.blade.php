<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>DigitalMonkey</title>
        <link rel="stylesheet" href="/css/app.css">
        <script src="{{ Helper::env_asset('/js/vendor.js') }}"></script>
        @include('components.favicon')
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
