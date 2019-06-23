@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')


@section('title', 'My Items')

@section('content')
@if($agent->isMobile())
<div class="container myitem-content">
        <h1>
            My Items
        </h1>

        <div class="mt-5 row justify-content-around">
        @foreach($user_items as $myitems)
            <div class="d-inline-block one-item">
                <a href="/items/{{ $myitems->id }}">
                    <div class="item-image">
                        <img src="{{asset('uploads') .'/'. $myitems->item_primary_image}}" width="100%">
                    </div>  
                    <hr>
                    <div class="item-desc">
                        <span class="text-success">{{$myitems->item_title}}</span>
                        <br>
                        <small class="text-success">{{ germanizer($myitems->item_min_price, $myitems->item_max_price, date('w') + 1)}} AED</small>

                        <small>
                            <div class="text-muted">
                                <i class="fas fa-layer-group"></i>
                                {{ $myitems->category->category_name }}
                            </div>
                           
                            <div class="text-muted location">
                                <i class="fas fa-map-marker-alt"></i>
                                    {{ $myitems->location->user_location_area}} > {{ $myitems->location->user_location_city}}
                            </div>
                        </small>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @else
	<div class="container myitem-content">
		<h1>
			My Items
		</h1>

		<div class="row all-item">
        @foreach($user_items as $myitems)
        <!-- <li>
        <a href="/items/{{ $myitems->id }}">
            {{ $myitems->title }}
        </a>
    </li> -->
        <div class="card mb-3 ml-3 item-card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img alt="" class="card-img" src="{{asset('uploads') .'/'. $myitems->item_primary_image}}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $myitems->item_title }} <small class="float-right text-success">{{ germanizer($myitems->item_min_price, $myitems->item_max_price, date('w') + 1)}} AED</small>
                        </h5>
                       <div class="card-text">
                            <small>
                                <div class="text-muted">
                                    <i class="fas fa-layer-group"></i>
                                    {{ $myitems->category->category_name }}
                                </div>
                                <div class="text-muted location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $myitems->location->user_location_area}} > {{ $myitems->location->user_location_city}}
                                </div>
                            </small>
                            <br>
                            <a class="btn-sm btn btn-success" href="/items/{{ $myitems->id }}/edit">
                                Edit
                            </a>
                            <br>
                            <small class="text-muted">
                                {{ $myitems->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    @endif
@endsection