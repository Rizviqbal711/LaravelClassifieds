@extends('layouts.layout')

@section('title' , 'Search Results')


@section('content')
<div class="container myitem-content">
	<h1>
		Search
	</h1>
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
@endsection