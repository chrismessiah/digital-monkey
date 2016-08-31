<!DOCTYPE html>
<html>
    <head>
        <title>My Blog</title>
        <link rel="stylesheet" href="/css/app.css">
        <script src="{{ Helper::env_asset('/js/vendor.js') }}"></script>
        
        <script src="//cdn.jsdelivr.net/medium-editor/latest/js/medium-editor.min.js"></script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/medium-editor/latest/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
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
