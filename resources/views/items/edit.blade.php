@extends('layouts.layout')


@section('title' , 'Edit Item')

@section('content')
<div class="container col-md-3" style="margin-top: 100px;">
	
	<h1 class="text-center">
		Edit Item
	</h1>

	<form method="POST" action="/items/{{ $item->id }}" enctype="multipart/form-data">
		
		@method('PATCH')
		@csrf

		<div class="form-group">
            <label>Title</label>
    		<input type="text" class="form-control" placeholder="Title" name="item_title" value="{{ $item->item_title }}">
        </div>
        <div class="form-group">
            <label>
                Description
            </label>
                <!-- <input  id="inputPassword3" placeholder="Password" type="password"> -->
            <textarea  class="form-control" name="item_description" placeholder="Description">{{ $item->item_description }}</textarea>
        </div>
        <div class="form-group">
            <label>
                Category
            </label>
                <!-- <input  id="inputPassword3" placeholder="Password" type="password"> -->
                <select class="form-control custom-select" placeholder="Category" name="category_id">
                    <option disabled selected>Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id  ? 'selected' : ''}}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
               
        </div>
        <div class="form-group">
            <label>
                Age
            </label>
                <!-- <input  id="inputPassword3" placeholder="Password" type="password"> -->
                <select class="form-control custom-select" placeholder="Age" name="item_age">
            		<option disabled selected>Age</option>
            		<option value="1" {{ $item->item_age == 1  ? 'selected' : ''}}>Brand New</option>
            		<option value="2" {{ $item->item_age == 2  ? 'selected' : ''}}>1 - 6 Months</option>
            		<option value="3" {{ $item->item_age == 3  ? 'selected' : ''}}>6 - 12 Months</option>
            		<option value="4" {{ $item->item_age == 4  ? 'selected' : ''}}>1 - 2 Years</option>
            		<option value="5" {{ $item->item_age == 5  ? 'selected' : ''}}>2 - 5 Years</option>
            		<option value="6" {{ $item->item_age == 6  ? 'selected' : ''}}>5+ Years</option>
            	</select>
        </div>
        <div class="form-group">
            <label>
            	Min. Price
            </label>
            <input name="item_min_price" class="form-control" placeholder="Minimum Price" type="text" value="{{ $item->item_min_price }}">
        </div>
        <div class="form-group">
            <label>
            	Max. Price
            </label>
            <input name="item_max_price" class="form-control" placeholder="Maximum Price" type="text" value="{{ $item->item_max_price }}">
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="item_primary_image">
        </div>
        @if($item->item_primary_image)
            <input type="hidden" name="item_primary_image" value="{{$item->item_primary_image}}">
        @endif
        <div class="img-uploads">
            @if($item->item_primary_image)
                <img src="{{asset('uploads') .'/'. $item->item_primary_image}}" width="100">
            @endif
        </div>
        <hr>
        <div class="card mb-3" >
            <div class="card-body">
                <h4 class="text-center">
                    User Details
                </h4>
                <label>Location</label>
                <select class="form-control custom-select" placeholder="Category" name="user_location_id">
                    <option disabled selected>Location</option>
                    @foreach($locations as $lcn)
                        <option value="{{ $lcn->id }}" {{$lcn->id == $item->user_location_id ? 'selected' : '' }}>{{ $lcn->user_location_name }}</option>
                    @endforeach
                </select>
                <div class="mt-3">
                    <button class="btn btn-success col-md-12 " id="place_button">+ Add Place</button>
                    <div class="place_form mt-3">
                        <div class="form-group">
                            <label>Location Name</label>
                            <input type="text" class="form-control" placeholder="Home, Work" name="user_location_name" >
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="Dubai" name="user_location_city" >
                        </div>
                        <div class="form-group">
                            <label>Area</label>
                            <input type="text" class="form-control" placeholder="Al Nahda 2, Qusais" name="user_location_area" >
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="form-group">
            <div>
                <button class="btn btn-success col-md-12" type="submit">
                    Submit
                </button>
            </div>
        </div>
	</form>

	<form method="POST" action="/items/{{ $item->id }}">
		
		@method('DELETE')
		@csrf

		<div class="form-group">
			<button type="submit" class=" btn btn-danger col-md-12">Delete</button>
		</div>
	</form>
</div>







@endsection