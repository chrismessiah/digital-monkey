<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DigitalMonkey</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        @yield('head')

        <meta name="author" content="Christian Abdelmassih">
        <meta name="description" content="A tech blog made in effort to learn Laravel.">
        <meta name="keywords" content="Christian, Abdelmassih, Digital, Monkey, DigitalMonkey">

        <link rel="stylesheet" href="/css/app.css">
        <script src="{{ Helper::env_asset('/js/vendor.js') }}"></script>
        @include('components.favicon')
    </head>
    <body>
        @include('components.header.master')
        @yield('content')
        @include('components.footer')
        @yield('js')
        @include('errors.swal')
    </body>
</html>
