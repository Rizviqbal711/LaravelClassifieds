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
        <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
        </script>
        <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
        </script>
        <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9">
        </script>
        <script src="{{ asset('js/privacy.js') }}"></script>
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    </head>
    <body class="eupopup eupopup-bottom eupopup-style-compact">
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                appId      : '2035159810123718',
                cookie     : true,
                xfbml      : true,
                version    : 'v3.3'
            });
      
            FB.AppEvents.logPageView();   
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
      
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>
        @include('include.navbar')
        <div class="body-content">
            @yield('content')
        </div>
        <footer class="text-white bg-dark footer-content ">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-container">
                        <a class="align-middle footer-logo" href="/">
                            <span  class="text-white" style="font-family: MuseoSans-500; font-size: 35px;">QUICK<span class="text-success">LIST</span></span>
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