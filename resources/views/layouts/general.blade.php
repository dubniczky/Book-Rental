<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        <link href="/css/app.css" rel="stylesheet">
        <script href="/js/app.js"></script>
    </head>
    <body>

        @include('components.header')

        <!-- Content -->
        @yield('content')
        <!-- /Content -->

        <!-- Footer -->
        @include('components.footer')
        <!-- /Footer -->
        
    </body>
</html>