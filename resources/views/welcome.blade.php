@extends('layouts.layout')



@section('title', 'QuickList')

@section('content')
<div class="modal" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="thank-you-pop">
                    <img src="{{ asset('images/green-tick.png')}}" alt="">
                    <h2>Hey, Thanks for getting in touch!</h2>
                    <p>{{session('success')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="video-banner">
        <div class="video-image-container">
            <img src="{{asset('images/preview.png')}}" class="video-image">
        </div>
    <div class="d-flex justify-content-center align-items-center video-container">
        <div class="video-overlay"></div>
    <video autoplay muted loop class="embed-responsive-item video-banner-vid" id="autovid">
        <source src="{{asset('images/preview.mov')}}" type="video/mp4">
    </video>
    <div class="container bannercontainer ">
        <h1 class=" display-4 text-center headline">
            Now, what can we help you to find?
        </h1>
        <div class="col-md-12">
            <form action="/search" method="get" role="search">
                <div class="input-group search-bar">
                    @csrf()
                    <input class="form-control" id=typed4 name="search" type="text">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>



<!-- <div class="jumbotron overlay">
</div> -->
<div class="bg-white border-top border-bottom border-dark pt-5 pb-5">
    
 <div class=" container mt-4 ">
        <h2 class="text-center ncol font-weight-bold">Why QuickList?</h2>
        <div class="row">
            <div class="col text-center mt-5 mb-5">
                <div class="about-image">
                    <img src="{{ asset('images/website.png') }}" width="60">
                </div>
                <h3>Join</h3>
                <div class="text-wrap row justify-content-center">
                    <p class="why-text">
                        Be a part of Dubai’s simplest, speediest and friendliest online marketplace.
                    </p>
                </div>
            </div>
            <div class="col text-center mt-5 mb-5">
                <div class="about-image">
                    <img src="{{ asset('images/list.png') }}" width="60">
                </div>
                <h3>List</h3>
                <div class="text-wrap row justify-content-center">
                    <p class="why-text">
                        Post your items in seconds.
                    </p>
                </div>
            </div>
            <div class="col text-center mt-5 mb-5">
                <div class="about-image">
                    <img src="{{ asset('images/browse.png') }}" width="60">
                </div>
                <h3>Browse</h3>
                <div class="text-wrap row justify-content-center">
                    <p class="why-text">
                        Find just what you want at great prices.
                    </p>
                </div>
            </div>
            <div class="col text-center mt-5 mb-5">
                <div class="about-image">
                    <img src="{{ asset('images/gift.png') }}" width="60">
                </div>
                <h3>Win</h3>
                <div class="text-wrap row justify-content-center">
                    <p class="why-text">
                        Free raffles for exiting prices every weekend!<br>Login to find out more.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container recommendation">
    <h2 class="text-center ncol font-weight-bold">
        RECOMMENDATIONS
    </h2>
    <div class="mt-5 row justify-content-around">
        @foreach($items as $i => $item)
            <div class="card d-inline-block mr-3 mb-3 home-card" style="">
            <img alt="..." class="card-img-top" src="{{asset('uploads') .'/'. $item->item_primary_image}}"/>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item->item_title }} <small class="float-right text-success">{{ germanizer($item->item_min_price, $item->item_max_price, date('w') + 1)}} AED</small>
                    </h5>
                    <div class="card-text item-card-desc">
                        <div class="text-muted">
                            <i class="fas fa-layer-group"></i>
                            {{ $item->category->category_name }}
                        </div>
                        @guest
                        <div class="text-muted">
                            <i class="fas fa-user"></i>
                            Login/Register to see the User Details
                        </div>
                        @else
                        <div class="text-muted">
                            <i class="fas fa-user"></i> {{ $item->user->name }} <br>
                            <i class="fas fa-phone"></i> {{ $item->user->phone }}
                            @if ($item->user->contact_whatsapp == 1 )
                                <a href="https://api.whatsapp.com/send?phone={{ $item->user->phone }}" class="text-success"><i class="fab fa-whatsapp"></i></a>
                             @endif
                        </div>
                        @endguest
                        <div class="text-muted location">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $item->location->user_location_area}} > {{$item->location->user_location_city}}
                        </div>                          
                        <br>
                        <a class="btn-sm btn btn-success" href="/items/{{ $item->id }}">
                            View Ad
                        </a>
                        <br>
                        <small class="text-muted">
                            {{ $item->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3 mb-4">
        <a href="/items" class="btn btn-success">View All</a>
    </div>
</div>
<div class="container-fluid bg-white border-top border-bottom border-dark pt-5 pb-5" id="about">
    <div class="container text-center mb-5 mt-5">
        <div>
            <h2 class="ncol font-weight-bold">
                Join the Quicklist family!
            </h2>
            <p class="mt-5 about-text">
               Quicklist is an innovative and intelligent digital classifieds platform developed to transform online buying and selling in Dubai... And it’s FREE! Using Quicklist is beautifully quick and easy – and there are no annoying commercials to get in your way. You can chat securely on WhatsApp via Quicklist with a buyer or seller. Plus, a brand new smart pricing feature helps you to sell or buy your items for the right price. Sorted!
            </p>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 ">
                <h3>SMART PRICING means everyone’s happy!</h3>
                <p>Quicklist’s own smart and flexible pricing algorithm adds fun and value to every transaction.</p>
                <div class="row text-left mt-5">
                    <div class="col-md-6">
                        <div class="card border-success pricing-card mt-3">
                            <div class="card-body align-items-center d-flex">
                                1. A seller sets the minimum (and an optional maximum) price for their item
                            </div>
                        </div>
                        <div class="card border-success pricing-card mt-3">
                            <div class="card-body align-items-center d-flex">
                              2. The Quicklist algorithm varies the price within that range every 24 hours
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success pricing-card mt-3">
                            <div class="card-body align-items-center d-flex">
                            3. The buyer has fun deciding when to buy – and the price that makes them happy!
                            </div>
                        </div>
                        <div class="card border-success pricing-card mt-3">
                            <div class="card-body align-items-center d-flex">
                            4. Sellers can also choose to offer discounts
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        
        <h2> Unleash the Fun! </h2>
            <p>Watch Now</p>
        <div class=" container-fluid row justify-content-center align-items-center ">
            <div class="embed-responsive embed-responsive-16by9 video">
                <iframe width="640" height="360" src="https://www.youtube.com/embed/ty6bRi9w4S4?rel=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
            </div>  
        </div>
        <div class="row justify-content-center align-items-center mt-5">
            <div class="text-center">
                <a href="/login" class="btn btn-success btn-lg "> Start listing now. It’s absolutely FREE!</a>    
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-5" id="contact">
    <h2 class="text-center ncol font-weight-bold">Get In Touch</h2>
    <div class="container">   
        <div class="row">
            <div class="col-md-6">
                <div class="mt-5">
                    <h1 class="font-weight-bold">
                        Hello Quicklister!
                        <br>
                        How are we doing?
                    </h1>
                    <p class="mt-4">
                        Because we’ve built Quicklist for members like you, we’d really value your opinions on how we’re doing.
                        <br><br>
                        What features do you love most of all?<br>
                        What could we do better?<br>
                        Do you have any suggestions for new categories or features?
                        <br><br>
                        Please let us know on the form – and watch out to see your ideas become reality!

                    </p>
                </div>
            </div>
            <div class="col-md-6 text-left">
                <form method="post" action="/contact-us">
                    {{ csrf_field() }}
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message" spellcheck="false"></textarea required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">

                    <div class="form-group mt-3">
                        <button type="submit" id="send-message" class="btn btn-md btn-success send-message">Send Message</button>
                    </div>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@if (session('success'))
<script type="text/javascript">
   $( document ).ready(function() {
        $('#myModal').modal('show');
    });
      
</script>
@endif
<script type="text/javascript">
       grecaptcha.ready(function() {
        grecaptcha.execute( '6LdCTqoUAAAAAPE3ZQ7_kMhDZQNVObt_houfvMHd' , { action: 'contact' } )
           .then(function(token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
                $('.send-message').removeAttr('disabled','disabled');
            });
     });

</script>
@endsection
