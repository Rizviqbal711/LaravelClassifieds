<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link href="{{ asset('images/icon.png') }}" rel="icon" type="image/x-icon">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
</head>
<body>
    <script>
             function statusChangeCallback(response) {
                console.log('statusChangeCallback');
                console.log(response);
                // The response object is returned with a status field that lets the
                // app know the current login status of the person.
                // Full docs on the response object can be found in the documentation
                // for FB.getLoginStatus().
                if (response.status === 'connected') {
                    // Logged into your app and Facebook.
                    console.log('Welcome!  Fetching your information.... ');
                    FB.api('/me', function (response) {
                        console.log('Successful login for: ' + response.name);
                        document.getElementById('status').innerHTML =
                          'Thanks for logging in, ' + response.name + '!';
                    });
                } else {
                    // The person is not logged into your app or we are unable to tell.
                    document.getElementById('status').innerHTML = 'Please log ' +
                      'into this app.';
                }
            }

            function checkLoginState() {
                FB.getLoginStatus(function (response) {
                    statusChangeCallback(response);
                });
            }

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
    @yield('content')
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
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
