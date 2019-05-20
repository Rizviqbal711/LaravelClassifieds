@extends('layouts.layout')


@section('title', 'My Items')

@section('content')
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
                            {{ $myitems->item_title }}
                        </h5>
                        <p class="card-text">
                            {{ $myitems->item_description }}
                            <br>
                            <br>
                            <small>
                              
                            </small>
                        </p>
                        <p class="card-text">
                            <a class="btn-sm btn btn-success" href="/items/{{ $myitems->id }}/edit">
                                Edit
                            </a>
                            <br>
                            <small class="text-muted">
                                {{ $myitems->created_at->diffForHumans() }}
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection