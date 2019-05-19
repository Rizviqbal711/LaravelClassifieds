<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            QuickList
        </a>
        <button aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler collapsed" data-target="#navbarResponsive" data-toggle="collapse" type="button">
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
                    <a class=" btn btn-success btn-sm" href="/list">
                        List your item
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="btn btn-sm btn links" href="/items">
                        Browse Ads
                    </a>
                </li>
                @guest
                <li class="nav-item mr-1">
                    <a class="btn btn-sm links" href="{{ route('login') }}">
                        {{ __('Login / Register') }}
                    </a>
                </li>
                @else
                <li class="nav-item dropdown mr-1 mb-1">
                    <a aria-expanded="false" aria-haspopup="true" class="btn btn-sm btn-outline-success dropdown-toggle " data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                        {{ Auth::user()->name }}
                        <span class="caret">
                        </span>
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                        <!-- <a href="/home" class="dropdown-item">Dashboard</a> -->
                        <a href="/myitems" class="dropdown-item">My Items</a>
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
