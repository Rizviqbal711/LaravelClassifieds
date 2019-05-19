@extends('layout')


@section('title', 'Add Item')


@section('content')
<div class="container col-md-3" style="margin-top: 100px;">
    <h1 class="text-center">
        Add Items
    </h1>
    <form action="/items" method="POST" enctype="multipart/form-data">
        @csrf()
        <div class="form-group">
          <!--   <label class="col-sm-2 col-form-label" for="inputEmail3">
                Title
            </label>
            <div class="col-sm-10">
                <input name="title" class="form-control" placeholder="Title" type="text" value="{{ old('title') }}">
            </div> -->
            <label>Title</label>
    		<input type="text" class="form-control" placeholder="Title" name="item_title">
        </div>
        <div class="form-group">
            <label>
                Description
            </label>
                <!-- <input  id="inputPassword3" placeholder="Password" type="password"> -->
            <textarea  class="form-control" name="item_description" placeholder="Describe your Item, List down as much detail as possible">{{ old('description') }}
            </textarea>
        </div>
        <div class="form-group">
            <label>
                Age
            </label>
                <!-- <input  id="inputPassword3" placeholder="Password" type="password"> -->
                <select class="form-control custom-select" placeholder="Age" name="item_age">
            		<option disabled selected>Age</option>
            		<option>Brand New</option>
            		<option>1 - 6 Months</option>
            		<option>6 - 12 Months</option>
            		<option>1 - 2 Years</option>
            		<option>2 - 5 Years</option>
            		<option>5+ Years</option>
            	</select>
                <!-- <textarea  class="form-control" name="description" placeholder="Description">
                {{ old('description') }}
            	</textarea> -->
        </div>
        <div class="form-group">
            <label>
            	Min. Price
            </label>
            <input name="item_min_price" class="form-control" placeholder="Minimum Price" type="text" value="{{ old('min_price') }}">
        </div>
        <div class="form-group">
            <label>
            	Max. Price
            </label>
            <input name="item_max_price" class="form-control" placeholder="Maximum Price" type="text" value="{{ old('max_price') }}">
        </div>
        <div class="form-group">
            <label>
            	City
            </label>
            <select class="form-control custom-select" name="item_city">
            	<option disabled selected>Select City</option>
            	<option>Abu Dhabi</option>
            	<option>Dubai</option>
            	<option>Sharjah</option>
            	<option>Ajman</option>
            	<option>Ras Al Khaimah</option>
            	<option>Fujeirah</option>
            </select>
            <!--     <input name="Country" class="form-control" placeholder="Country" type="text" value="{{ old('country') }}"> -->
        </div>
        <div class="form-group">
            <label>
            	Area
            </label>
        	<input type="text" name="item_area" placeholder="Area" value="{{ old('item_area') }}" class="form-control">
            <!--     <input name="Country" class="form-control" placeholder="Country" type="text" value="{{ old('country') }}"> -->
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="item_image[]" multiple>
        </div>
        <div class="form-group">
            <div>
                <button class="btn btn-success col-md-12" type="submit">
                    Submit
                </button>
            </div>
        </div>
    </form>
   <!--  <form action="/items" method="POST">
        @csrf()
        <div>
            
        </div>
        <div>
            <textarea name="description" placeholder="Description">
                {{ old('description') }}
            </textarea>
        </div>
        <div>
            <button type="submit">
                Submit
            </button>
        </div>
    </form> -->
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection
