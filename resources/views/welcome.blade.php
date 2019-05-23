@extends('layouts.layout')



@section('title', 'QuickList')

@section('content')
<div class="jumbotron overlay">
    <div class="container bannercontainer row justify-content-center align-items-center">
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
<div class="container">
    <h2 class="text-center">About QuickList</h2>
    <div class="row">
        <div class="col text-center mt-5 mb-5">
            <div class="about-image">
                <img src="{{ asset('images/website.png') }}" width="100">
            </div>
            <h3>Register</h3>
            <p class="text-wrap">Register on the simplest and yet quickest classifieds website</p>
        </div>
        <div class="col text-center mt-5 mb-5">
            <div class="about-image">
                <img src="{{ asset('images/list.png') }}" width="100">
            </div>
            <h3>List</h3>
            <p class="text-wrap">List your item in just few steps and start selling.</p>
        </div>
        <div class="col text-center mt-5 mb-5">
            <div class="about-image">
                <img src="{{ asset('images/gift.png') }}" width="100">
            </div>
            <h3>Win</h3>
            <p class="text-wrap">Win exciting prizes every weekend</p>
        </div>
    </div>
</div>
<hr>
<div class="container">
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
                                    {{ $item->user->name }}
                                </div>
                                @endguest
                                <div class="text-muted location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $item->item_area}} > {{ $item->item_city}}
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
    <div class="d-flex justify-content-center mt-5">
        <a href="/items" class="btn btn-success">View All</a>
    </div>
</div>
@endsection
