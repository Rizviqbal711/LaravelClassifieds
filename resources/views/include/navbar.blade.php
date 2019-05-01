<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            WebsiteName
        </a>
        <button aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarResponsive" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Right Side Of Navbar -->
            @if (\Request::is('login') || \Request::is('register')) 
            @else
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item mr-1 mb-1">
                    <a class=" btn btn-success btn-sm" href="#">
                        List your item
                    </a>
                </li>
                <li class="nav-item mr-1 mb-1 ">
                    <a class="btn btn-sm links" href="/items">
                        Browse Ads
                    </a>
                </li>
                @guest
                <li class="nav-item mr-1 mb-1">
                    <a class="btn btn-sm links" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item mr-1 mb-1">
                    <a class="btn btn-sm links" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                </li>
                @endif
                @else
               <!--  <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div> -->











                <li class="nav-item dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                        <span class="caret">
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                         <a class="dropdown-item" href="/home">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
            @endif
        </div>
    </div>
</nav>
