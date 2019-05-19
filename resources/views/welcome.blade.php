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
            <p>List your Item quickly without any complications</p>
        </div>
        <div class="col text-center mt-5 mb-5">
            <div class="about-image">
                <img src="{{ asset('images/website.png') }}" width="100">
            </div>
            <h3>List</h3>
            <p>Find the right item you want quickly</p>
        </div>
        <div class="col text-center mt-5 mb-5">
            <div class="about-image">
                <img src="{{ asset('images/website.png') }}" width="100">
            </div>
            <h3>Deal</h3>
            <p>Chat with the seller/buyer easily</p>
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
            <img alt="..." class="card-img-top" src="..."/>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item->item_title }}
                    </h5>
                    <p class="card-text">
                        {{ $item->item_description }}
                    </p>
                    <p class="card-text">
                        <a href="/items/{{ $item->id }}" class="btn btn-success">View Ad</a><br><br>
                        <small class="text-muted">
                            {{ $item->created_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5">
        <a href="/items" class="btn btn-success">View All</a>
    </div>
</div>
@endsection
