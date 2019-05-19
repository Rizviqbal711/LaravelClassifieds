@extends('layouts.layout')

@section('title' , 'Search Results')


@section('content')
<div class="container myitem-content">
	<h1>
		Search
	</h1>
	<div class="card-deck items">
		@foreach($search_qry as $search)
	    	<div class="card">
	    		<img alt="..." class="card-img-top" src="..."/>
	            <div class="card-body">
	            	<h5 class="card-title">
	                	{{ $search->item_title }}
	                </h5>
	                <p class="card-text">
	                	{{ $search->item_description }}
	                </p>
	                <p class="card-text">
	                	<a href="/items/{{ $search->id }}" class="btn btn-success">View Ad</a><br><br>
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