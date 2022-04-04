<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
    </head>
    <body>
        <!-- Header -->
        @include('components.header')
        <!-- /Header -->

        <!-- Content -->
        @yield('content')
        <!-- /Content -->

        <!-- Footer -->
        @include('components.footer')
        <!-- /Footer -->
        
    </body>
</html>