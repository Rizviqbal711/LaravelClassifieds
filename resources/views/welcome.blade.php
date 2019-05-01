@extends('layout')



@section('title')

New Idea
@endsection
@section('content')
<div class="jumbotron">
    <div class="container bannercontainer">
        <h1 class="display-3 text-center">
            Some Catchy Quote
        </h1>
        <p class="text-center">
            Some Subheading Catchy quote
        </p>
        <p>
            <div class="input-group">
                <input class="form-control" placeholder="Search" type="text">
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
</div>
@endsection
