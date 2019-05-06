@extends('layout')



@section('title' , 'Items')


@section('content')
<div class="categories">
    <div class="container">
        <h5>
            @foreach($categories as $category)
		    	{{ $category->category_name }}  
		    @endforeach
        </h5>
    </div>
</div>
<div class="container search-content">
    <div class="card">
        <div class="card-body">
        	 <div class="input-group">
                <input class="form-control" placeholder="Search" type="text">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="container item-content">
    <h1>
        Items
    </h1>
    <div class="row all-item">
        @foreach($items as $item)
        <!-- <li>
        <a href="/items/{{ $item->id }}">
            {{ $item->title }}
        </a>
    </li> -->
        <div class="card mb-3 ml-3 item-card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img alt="..." class="card-img" src="...">
                    </img>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$item->title}}
                        </h5>
                        <p class="card-text">
                            {{$item->description}}
                            <br>
                                <br>
                                    <small>
                                        {{ $item->category->category_name }}
                                    </small>
                                </br>
                            </br>
                        </p>
                        <p class="card-text">
                            <a class="btn-sm btn btn-success" href="/items/{{ $item->id }}">
                                View Ad
                            </a>
                            <br>
                                <small class="text-muted">
                                        Last updated 3 mins ago
                                </small>
                            </br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
