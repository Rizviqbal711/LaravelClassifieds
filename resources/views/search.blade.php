@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')

@section('title' , 'Search Results')

@section('content')
@if($agent->isMobile())
<div class="container">
    <h1>
        Search
    </h1>
    <div>
        
        <form action="/search" method="get" role="search">
            <div class="input-group search-bar">
                @csrf()
                <input class="form-control search-bar" placeholder="Search" name="search" type="text">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-5 row justify-content-around">
        @foreach($search_qry as $item)
            <div class="d-inline-block one-item">
                <a href="/items/{{ $item->id }}">
                    <div class="item-image">
                        <img src="{{asset('uploads') .'/'. $item->item_primary_image}}" width="100%">
                    </div>  
                    <hr>
                    <div class="item-desc">
                        <span class="text-success">{{$item->item_title}}</span>
                        <br>
                        <small class="text-success">{{ germanizer($item->item_min_price, $item->item_max_price, date('w') + 1)}} AED</small>

                        <small>
                            <div class="text-muted">
                                <i class="fas fa-layer-group"></i>
                                {{ $item->category->category_name }}
                            </div>
                           
                            <div class="text-muted location">
                                <i class="fas fa-map-marker-alt"></i>
                                    {{ $item->item_area}} > {{ $item->item_city}}
                            </div>
                        </small>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@else
<div class="container myitem-content">
	<h1>
		Search
	</h1>
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
	<div class="mt-5 row justify-content-around">
		@foreach($search_qry as $search)
	    	<div class="card d-inline-block mr-3 mb-3 home-card">
	    		<img src="{{asset('uploads') .'/'. $search->item_primary_image}}" class="card-img-top">
	            <div class="card-body">
	            	<h5 class="card-title">
	                	{{ $search->item_title }}  <small class="float-right text-success">{{ germanizer($search->item_min_price, $search->item_max_price, date('w') + 1)}} AED</small>
	                </h5>
	                <div class="card-text">
                            <small>
                                <div class="text-muted">
                                    <i class="fas fa-layer-group"></i>
                                    {{ $search->category->category_name }}
                                </div>
                                @guest
                                <div class="text-muted">
                                    <i class="fas fa-user"></i>
                                    Login/Register to see the User Details
                                </div>
                                @else
                                 <div class="text-muted">
                                    <i class="fas fa-user"></i>
                                    {{ $search->user->name }} - <i class="fas fa-phone"></i>
                                    {{ $search->user->phone }}
                                </div>
                                @endguest
                                <div class="text-muted location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $search->item_area}} > {{ $search->item_city}}
                                </div>
                            </small>
                            <br>
                            <a class="btn-sm btn btn-success" href="/items/{{ $search->id }}">
                                View Ad
                            </a>
                            <br>
                            <small class="text-muted">
                                {{ $search->created_at->diffForHumans() }}
                            </small>
                    </div>
	        	</div>
	        </div>
	    @endforeach
	</div>
</div>
@endif
@endsection