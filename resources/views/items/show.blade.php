@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')

@section('title',  $item->item_title)

@section('content')
<div class="container show-item-content">
    <div class="row">
        <div class="col-md-7">
            <div>
                <div class="d-inline-block">
                    <h1>{{ $item->item_title }} <small> - <span class="text-success">{{ germanizer($item->item_min_price, $item->item_max_price, date('w') + 1)}} AED</span></small></h1> 
                </div>
                @if(Auth::user())
                    @if(Auth::user()->id == $item->user_id)
                    <div class="d-inline-block">
                        <a href="/items/{{ $item->id }}/edit" class="btn btn-sm btn-success">
                        Edit/Delete
                        </a>
                    </div>
                    @endif
                @endif
            </div>
            <div>
                @if($item->item_primary_image)
                <img src="{{asset('uploads') .'/'. $item->item_primary_image}}" class="item-image">
                @endif
            </div>
        </div>
        <div  class="col-md-5 item-desc" >
            <div class="align-top mt-5">
                <h3><u>Description</u></h3>
                {{ $item->item_description}}
            </div>
            <div class="other-desc">
                <h4><u>Details</u></h4>
                <div class="text-muted user">
                    <i class="fas fa-user"></i>
                    {{ $item->user->name }} - <i class="fas fa-phone"></i>
                    {{ $item->user->phone }} 
                    @if ($item->user->contact_whatsapp == 1 )
                        <a href="https://api.whatsapp.com/send?phone={{ $item->user->phone }}" class="text-success font-16"><i class="fab fa-whatsapp"></i></a>
                    @endif

                </div>
                <div class="text-muted location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span id="address">{{ $item->location->user_location_area}}</span> > {{ $item->location->user_location_city}}
                </div>
            </div>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{$route}}&display=popup" style="font-size: 30px;" class="facebook-link"> 
                <i class="fab fa-facebook-square"></i> 
            </a>
            <a href="http://twitter.com/share?text=Hey! I found this amazing item on Qucklist!&url={{$route}}" style="font-size: 30px;" class="twitter-link"> 
                <i class="fab fa-twitter-square"></i>
            </a>
            <a href="whatsapp://send?text= Hey! I found this amazing item on Quicklist!{{$route}}" data-action="share/whatsapp/share" style="font-size: 30px;" class="whatsapp-link">
                <i class="fab fa-whatsapp-square"></i>
            </a>
            <div id="map"></div>
        </div> 
    </div>
</div>
<script type="text/javascript">
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 12
        });
        infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                
                var address = document.getElementById( 'address' ).innerHTML;

                console.log(address);

                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({address: address }, function (results, status){
                    console.log(results)
                    infoWindow.open(map);
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        position: results[0].geometry.location ,
                        map: map

                    });
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
