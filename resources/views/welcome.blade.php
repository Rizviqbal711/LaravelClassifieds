@extends('layout')



@section('title')

New Idea
@endsection
@section('content')
<div class="jumbotron">
    <div class="container bannercontainer row justify-content-center align-items-center">
        <h1 class=" display-4 text-center">
            Find what you are looking for
        </h1>
        <p>
            <div class="input-group">
                <input class="form-control" id=typed4 type="text">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
            </div>
        </p>
    </div>
</div>
<div class="container">
    <h2 class="text-center">About QuickList</h2>
    <div class="row">
        <div class="col text-center mt-5 mb-5">
            <h3>Post</h3>
            <p>List your Item quickly without any complications</p>
        </div>
        <div class="col text-center mt-5 mb-5">
            <h3>Find</h3>
            <p>Find the right item you want quickly</p>
        </div>
        <div class="col text-center mt-5 mb-5">
            <h3>Deal</h3>
            <p>Chat with the seller/buyer easily</p>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <h2 class="text-center">
        ITEMS
    </h2>
    <div class="card-deck items">
        @foreach($items as $item)
        <div class="card">
            <img alt="..." class="card-img-top" src="..."/>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item->title }}
                    </h5>
                    <p class="card-text">
                        {{ $item->description }}
                    </p>
                    <p class="card-text">
                        <a href="/items/{{ $item->id }}" class="btn btn-success">View Ad</a><br><br>
                        <small class="text-muted">
                            Last updated 3 mins ago
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
