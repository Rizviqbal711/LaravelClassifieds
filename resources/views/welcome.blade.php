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
                    <h1>Thank You!</h1>
                    <p>{{session('success')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid video-banner">
    <div class="row justify-content-center align-items-center">
    <video autoplay muted loop class="embed-responsive-item video-banner-vid" id="autovid">
        <source src="{{asset('images/preview.mp4')}}" type="video/mp4">
    </video>
    <div class="container bannercontainer ">
        <h1 class=" display-4 text-center headline">
            Find what you are looking for
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
<div class="container recommendation">
    <h2 class="text-center">
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
                    <div class="card-text">
                            <small>
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
                                    <i class="fas fa-user"></i>
                                    {{ $item->user->name }} - <i class="fas fa-phone"></i>
                                    {{ $item->user->phone }}
                                    @if ($item->user->contact_whatsapp == 1 )
                                        <a href="https://api.whatsapp.com/send?phone={{ $item->user->phone }}" class="text-success"><i class="fab fa-whatsapp"></i></a>
                                     @endif
                                </div>
                                @endguest
                                <div class="text-muted location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $item->location->user_location_area}} > {{ $item->location->user_location_city}}
                                </div>
                            </small>
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
    <div class=" container mt-5">
        <h2 class="text-center">Why QuickList</h2>
        <div class="row">
            <div class="col text-center mt-5 mb-5">
                <div class="about-image">
                    <img src="{{ asset('images/website.png') }}" width="60">
                </div>
                <h3>Join</h3>
                <div class="text-wrap row justify-content-center">
                    <p class="why-text">
                        Join the simplest and yet quickest classifieds website.
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
                        List your items in seconds and start selling.
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
                        Free raffles for exiting prices every weekend!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center mb-5">
        <p>
            Quicklist is a simple and innovative online classifieds platform that is developed to change the way things sell in Dubai. 
            Quicklist introduces a new smart pricing feature which helps people to sell or buy any items for the right price. 
            To get things done fast, Quicklist has an Instant & Easy communication using WhatsApp and other messengers.
        </p>
    </div>
    <div class=" container-fluid row justify-content-center align-items-center ">
        <div class="embed-responsive embed-responsive-16by9 video">
            <iframe width="640" height="360" src="https://www.youtube.com/embed/ty6bRi9w4S4?rel=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
        </div>  
    </div>
    <div class="row justify-content-center align-items-center mt-5">
        <div class="text-center">
            <a href="/login" class="btn btn-success btn-lg "> Start Listing, It's Absoulety Free</a>    
        </div>
    </div>
</div>
<div class="container-fluid pt-5" id="contact">
    <div class="container text-center">
        <h2>Get In Touch</h2>
        <form method="post" action="/contact-us">
            {{ csrf_field() }}
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message" spellcheck="false"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" id="send-message" class="btn btn-md btn-success">Send Message</button>
            </div>
        </form>
    </div>
    

</div>
@if (session('success'))
<script type="text/javascript">
   $( document ).ready(function() {
        $('#myModal').modal('show');
    });
</script>
@endif
@endsection
