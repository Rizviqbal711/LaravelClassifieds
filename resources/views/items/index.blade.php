@extends('layout')



@section('title' , 'Items')


@section('content')
<div class="categories">
    <div class="container">
        @foreach($categories as $category)
            <div class="d-inline-block">
                <form action="/items" method="get">
                    <input type="hidden" name="category_id" value="{{ $category->id}}">
    		    	<button type="submit" class="btn text-white">{{ $category->category_name }} {{ $category->search_categories }}</button>  
                </form>
            </div>
    	@endforeach
    </div>
</div>
<div class="card">
    <div class="container">
        <div class="card-body">
            <form action="/search" method="get" role="search">
                <div class="input-group search-bar">
                    @csrf()
                    <input class="form-control search-bar" placeholder="Search" name="search" type="text">
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
                    @if($item->item_primary_image)
                    <img alt="..." class="card-img" src="{{asset('uploads') .'/'. $item->item_primary_image}}">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$item->item_title}}<small class="float-right text-success">{{ germanizer($item->item_min_price, $item->item_min_price, date('w') + 1)}} AED</small>
                        </h5>
                        <div class="card-text">
                            {{$item->item_description}}
                            <br>
                            <br>
                            <small>
                                <div class="text-muted">
                                    <i class="fas fa-layer-group"></i>
                                    {{ $item->category->category_name }}
                                </div>
                                 <div class="text-muted">
                                    <i class="fas fa-user"></i>
                                    {{ $item->user->name }}
                                </div>
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
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
