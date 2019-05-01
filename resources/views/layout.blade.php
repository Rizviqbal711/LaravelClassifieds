<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
            <!-- CSRF Token -->
        <meta content="{{ csrf_token() }}" name="csrf-token">
        <title>
            @yield('title')
        </title>
                    <!-- Fonts -->
        <link href="//fonts.gstatic.com" rel="dns-prefetch">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
                    <!-- Styles -->
        <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <link href="/css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('include.navbar')
        <div class="body-content">
            @yield('content')
        </div>
        <footer class="text-white bg-dark footer-content ">
            <div class="container text-center">
                All rights reserved
                <br>
                Made with ❤ in Dubai
            </div>
        </footer>
        <!-- Scripts -->
        <script defer="" src="{{ asset('js/app.js') }}">
        </script>
    </body>
</html>