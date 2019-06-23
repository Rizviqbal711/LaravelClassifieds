<nav class="navbar navbar-expand-lg navbar-dark {{Request::path() == 'privacy' || Request::path() == 'terms' ? 'bg-white' : 'bg-transparent'}} fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <span style="font-family: MuseoSans-500"><span class="{{Request::path() == '/' ? 'logo' : 'ncol-logo'}}">QUICK</span><span class="text-success">LIST</span></span>
        </a>
        @if (\Request::is('login') || \Request::is('register')) 
        @else
        <button aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler collapsed" data-target="#navbarResponsive" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item  mr-1 mb-1">
                    <a class=" btn btn-sm {{Request::path() == '/' ? 'links' : 'ncol'}}" href="/list">
                        List your item
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="btn btn-sm btn {{Request::path() == '/' ? 'links' : 'ncol'}}" href="/items">
                        Browse Ads
                    </a>
                </li>
                @guest
                <li class="nav-item  mr-1">
                    <a class="btn btn-sm {{Request::path() == '/' ? 'links' : 'ncol'}}" href="{{ route('login') }}">
                        {{ __('Login / Register') }}
                    </a>
                </li>
                @else
                <li class="nav-item dropdown mr-1 mb-1">
                    <a aria-expanded="false" aria-haspopup="true" class="btn btn-sm btn-outline-success dropdown-toggle {{Request::path() == '/' ? 'links' : 'ncol'}} " data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                        {{ Auth::user()->name }}
                        <span class="caret">
                        </span>
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                        <!-- <a href="/home" class="dropdown-item">Dashboard</a> -->
                        <a href="/myitems" class="dropdown-item">My Items</a>
                        <a href="/profile" class="dropdown-item">My Profile</a>
                        <a href="/rewards" class="dropdown-item">Your Rewards</a>
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
        </div>
        @endif
    </div>
</nav>
