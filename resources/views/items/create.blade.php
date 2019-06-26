@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')


@section('title', 'Add Item')


@section('content')

<div class="container col-md-3 create-container">
    <h1 class="text-center">
        Add Items
    </h1>
    <form action="/items" method="POST" enctype="multipart/form-data" >
        @csrf()
        <div class="form-group">
            <label>Title</label>
    		<input type="text" class="form-control {{$errors->has('item_title') ? 'is-invalid' : '' }}" placeholder="Title" name="item_title" value="{{ old('item_title') }}">
        </div>
        <div class="form-group">
            <label>
                Description
            </label>
            <textarea class="form-control {{$errors->has('item_description') ? 'is-invalid' : '' }}" name="item_description" placeholder="Describe your Item, List down as much detail as possible" >{{ old('item_description') }}</textarea>
        </div>
        <div class="form-group">
            <label>
                Category
            </label>
            <select class="form-control custom-select {{$errors->has('category_id') ? 'is-invalid' : '' }}" placeholder="Category" name="category_id">
                <option disabled selected>Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old("category_id") == $category->id ? "selected":"") }}>{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>
                Age
            </label>
                <!-- <input  id="inputPassword3" placeholder="Password" type="password"> -->
                <select class="form-control custom-select {{$errors->has('item_age') ? 'is-invalid' : '' }}" placeholder="Age" name="item_age">
            		<option disabled selected>Age</option>
                    <option value="1" {{ (old("item_age") == 1 ? "selected":"") }}>Brand New</option>
                    <option value="2" {{ (old("item_age") == 2 ? "selected":"") }}>1 - 6 Months</option>
                    <option value="3" {{ (old("item_age") == 3 ? "selected":"") }}>6 - 12 Months</option>
                    <option value="4" {{ (old("item_age") == 4 ? "selected":"") }}>1 - 2 Years</option>
                    <option value="5" {{ (old("item_age") == 5 ? "selected":"") }}>2 - 5 Years</option>
                    <option value="6" {{ (old("item_age") == 6 ? "selected":"") }}>5+ Years</option>
            	</select>
                <!-- <textarea  class="form-control" name="description" placeholder="Description">
                {{ old('description') }}
            	</textarea> -->
        </div>
        <div class="form-group">
            <label>
            	Min. Price
            </label>
            <input name="item_min_price" class="form-control {{$errors->has('item_min_price') ? 'is-invalid' : '' }}" placeholder="Minimum Price" type="text" value="{{ old('item_min_price') }}">
        </div>
        <div class="form-group">
            <label>
            	Max. Price
            </label>
            <div class="input-group">
                <input name="item_max_price" class="form-control {{$errors->has('item_max_price') ? 'is-invalid' : '' }}" placeholder="Maximum Price" type="text" value="{{ old('item_max_price') }}">
                <div class="input-group-append">
                    <span class="input-group-addon btn btn-success price-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-info-circle"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Images</label>
            <div class="custom-file">
                <input type="file" name="item_primary_image" class=" custom-file-input {{$errors->has('item_primary_image') ? 'is-invalid' : '' }}" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">
                    User Details
                </h4>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel"  class="form-control {{$errors->has('phone') ? 'is-invalid' : '' }}" name="phone" placeholder="9715XXXXXXXX" title="9715XXXXXXXX"  value="{{ $phone }}">
                </div>
                 <div class="form-group">
                    <label>Contact via Whatsapp</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input {{$errors->has('contact_whatsapp') ? 'is-invalid' : '' }}" id="customControlValidation2" name="contact_whatsapp" value="1">
                        <label class="custom-control-label" for="customControlValidation2">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input {{$errors->has('contact_whatsapp') ? 'is-invalid' : '' }}" id="customControlValidation3" name="contact_whatsapp" value="0">
                        <label class="custom-control-label" for="customControlValidation3">No</label>
                    </div>
                        
                </div>
                <label>Location</label>
                <select class="form-control custom-select {{$errors->has('user_location_id') ? 'is-invalid' : '' }}" placeholder="Category" name="user_location_id">
                    <option disabled selected>Location</option>
                    @foreach($locations as $lcn)
                        <option value="{{ $lcn->id }}">{{ $lcn->user_location_name }}</option>
                    @endforeach
                </select>
                <div class="mt-4">
                    <p class="h2">
                        <span>Or</span>
                    </p>
                </div>
                <div class="mt-4">
                    <h4 class="text-center">Add Place</h4>
                    <div class="mt-3">
                        <div class="form-group">
                            <label>Location Name</label>
                            <input type="text" class="form-control {{$errors->has('user_location_name') ? 'is-invalid' : '' }}" placeholder="Home, Work" name="user_location_name" value="{{ old('user_location_name') }}">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control {{$errors->has('user_location_city') ? 'is-invalid' : '' }}" placeholder="Dubai" name="user_location_city" value="{{ old('user_location_city') }}">
                        </div>
                        <div class="form-group">
                            <label>Area</label>
                            <input type="text" class="form-control input-area {{$errors->has('user_location_area') ? 'is-invalid' : '' }}" placeholder="Al Nahda 2, Qusais" name="user_location_area" value="{{ old('user_location_area') }}">
                        </div>
                        
                        <div id="map"></div>

                        <span class="btn btn-primary col-md-12 location-click">Get location</span>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="form-group mt-3">
            <div>
                <button class="btn btn-success col-md-12" type="submit">
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        If you dont want to use the QuickList's Smart Pricing Feature, Please enter the same amount as the "Minimum Price"
        <br><br>
        Read more about it 
        @if($agent->isMobile())
        <a href="/m/about">here</a>
        @else
        <a href="/">here</a>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

    var map, infoWindow;


    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 12
        });
        infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };


                infoWindow.open(map);
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map

                });
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({location: pos }, function (results, status){
                    $(".location-click").click(function(){
                        var array = results[0]["formatted_address"].split("-");
                        $(".place-form").find(".input-area").val(array[0]);

                        // alert();
                    })
                });
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });

        } else {
        // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }
</script>
@endsection
