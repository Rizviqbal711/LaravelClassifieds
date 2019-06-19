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
        <link href="{{ asset('images/icon.png') }}" rel="icon" type="image/x-icon">
        <!-- Fonts -->
        <link href="//fonts.gstatic.com" rel="dns-prefetch">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
         <!-- Styles -->
        <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <link href="/css/main.css" rel="stylesheet" type="text/css">
        <link href="/css/privacy.css" rel="stylesheet" type="text/css"/>
         <!-- Scripts -->
        <script  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/privacy.js') }}"></script>
    </head>
    <body class="eupopup eupopup-bottom eupopup-style-compact">
        @include('include.navbar')
        <div class=" {{Request::path() == '/' ? 'body-content-home' : 'body-content'}} ">
            @yield('content')
        </div>
        <footer class="text-white bg-dark footer-content ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 footer-container">
                        <a class="align-middle footer-logo" href="/">
                            <span  class="text-white" style="font-family: MuseoSans-500; font-size: 35px;">QUICK<span class="text-success">LIST</span></span>
                        </a>
                        <p style="width: 75%">
                           Quicklist is Dubai’s exciting and innovative digital classifieds platform, making buying and selling faster, easier and a whole lot more fun!
                        </p>
                    </div>
                    <div class="col-md-3 text-left footer-container">
                        <div class="mb-3">
                            <a class="text-white" href="/login">
                                Login
                            </a>
                        </div>
                        <div class="mb-3">
                            <a class="text-white" href="/register">
                                Register
                            </a>
                        </div>
                        <div class="mb-3">
                            <a class="text-white" href="/privacy">
                                Privacy Policy
                            </a>
                        </div>
                        <div>
                            <a class="text-white" href="/terms">
                                Terms and Condition
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 text-left footer-container">
                        <div class="mb-3">
                            <a class="text-white" href="/">
                                Home
                            </a>
                        </div>
                        <div class="mb-3">
                            <a class="text-white" href="#about">
                                About
                            </a>
                        </div>
                        <div class="mb-3">
                            <a class="text-white" href="#contact">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="border-top border-grey">
                <div class="container mt-4">
                    <div class="col-md-12 text-right footer-text">
                        Made with ❤ in Dubai
                    </div>
                </div>
            </div>
        </footer>
        <!-- Scripts -->
        <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.min.js">
        </script>
        <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
        </script>
        <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9">
        </script>
        <script type="text/javascript">
            $( document ).ready(function() {
                var typed4 = new Typed('#typed4', {
                    strings: ['Furniture', 'Television', 'Clothes'],
                    typeSpeed: 75,
                    backSpeed: 75,
                    attr: 'placeholder',
                    bindInputFocusEvents: true,
                    loop: true
                });
            });
        </script>
    </body>
</html>