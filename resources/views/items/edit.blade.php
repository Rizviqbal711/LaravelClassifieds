@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')


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
    		<input type="text" class="form-control  {{$errors->has('item_title') ? 'is-invalid' : '' }}" placeholder="Title" name="item_title" value="{{ $item->item_title }}">
        </div>
        <div class="form-group">
            <label>
                Description
            </label>
            <textarea  class="form-control {{$errors->has('item_description') ? 'is-invalid' : '' }}" name="item_description" placeholder="Description">{{ $item->item_description }}</textarea>
        </div>
        <div class="form-group">
            <label>
                Category
            </label>
            
                <select class="form-control custom-select  {{$errors->has('category_id') ? 'is-invalid' : '' }}" placeholder="Category" name="category_id">
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
                <select class="form-control custom-select {{$errors->has('item_age') ? 'is-invalid' : '' }}" placeholder="Age" name="item_age">
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
                Condition
            </label>
            <select class="form-control custom-select {{$errors->has('item_condition') ? 'is-invalid' : '' }}" placeholder="Age" name="item_condition">
                <option disabled selected>Condition</option>
                <option value="1" {{ $item->item_condition  == 1 ? "selected":"") }}>Perfect Inside and Out</option>
                <option value="2" {{ $item->item_condition == 2 ? "selected":"") }}>Almost no noticeable flaws </option>
                <option value="3" {{ $item->item_condition == 3 ? "selected":"") }}>A bit of wear and tear, But in good working condition</option>
                <option value="4" {{ $item->item_condition == 4 ? "selected":"") }}>Normal wear and tear, A few problems</option>
                <option value="5" {{ $item->item_condition == 5 ? "selected":"") }}>The item may need a repair to work properly</option>
            </select>
        </div>
        <div class="form-group">
            <label>
            	Min. Price
            </label>
            <input name="item_min_price" class="form-control {{$errors->has('item_min_price') ? 'is-invalid' : '' }}" placeholder="Minimum Price" type="text" value="{{ $item->item_min_price }}">
        </div>
        <div class="form-group">
            <label>
            	Max. Price
            </label>
            <input name="item_max_price" class="form-control {{$errors->has('item_max_price') ? 'is-invalid' : '' }}" placeholder="Maximum Price" type="text" value="{{ $item->item_max_price }}">
        </div>
        <div class="form-group">
            <label>Images</label>
            <div class="custom-file">
                <input type="file" name="item_primary_image" class=" custom-file-input {{$errors->has('item_primary_image') ? 'is-invalid' : '' }}" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
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
                    <a href="/profile" class="btn btn-success col-md-12"> + Add Place</a>
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