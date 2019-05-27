<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
</head>
<body>
    @include('include.navbar')
    @yield('content')
    <footer class="text-white bg-dark footer-content ">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-container">
                        <a class="align-middle footer-logo" href="/">
                            <img class="mt-2" src="{{ asset('images/logo.png') }}" width="50%">
                            </img>
                        </a>
                    </div>
                    <div class="col-md-4 text-center footer-container">
                        <a class="text-white" href="/privacy">
                            Privacy Policy
                        </a>
                        <br>
                            <a class="text-white" href="/terms">
                                Terms and Condition
                            </a>
                        </br>
                    </div>
                    <div class="col-md-4 text-right footer-text">
                        All rights reserved
                        <br>
                            Made with ❤ in Dubai
                        </br>
                    </div>
                </div>
            </div>
        </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
