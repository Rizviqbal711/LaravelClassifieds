@extends('layouts.layout')

@section('title',  $item->item_title)

@section('content')
<div class="container" style="margin-top: 100px; min-height: 68vh;">
    <div class="row">
        <div class="col-md-7">
            <div>
                <div class="d-inline-block">
                    <h1>{{ $item->item_title }} <small> - <span class="text-success">{{ germanizer($item->item_min_price, $item->item_max_price, date('w') + 1)}} AED</span></small></h1> 
                </div>
                @if(Auth::user())
                    <div class="d-inline-block">
                        <a href="/items/{{ $item->id }}/edit" class="btn btn-sm btn-success">
                        Edit
                        </a>
                    </div>
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

                </div>
                <div class="text-muted location">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $item->item_area}} > {{ $item->item_city}}
                </div>
            </div>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{$route}}&display=popup" style="font-size: 30px;" class="facebook-link"> 
                <i class="fab fa-facebook-square"></i> 
            </a>
            <a href="http://twitter.com/share?text=Hey! I found this amazing item on Qucklist!&url={{$route}}" style="font-size: 30px;" class="twitter-link"> 
                <i class="fab fa-twitter-square"></i>
            </a>
            <a href="whatsapp://send?text= Hey! I found this amazing item on Qucklist!" data-action="share/whatsapp/share" style="font-size: 30px;" class="whatsapp-link">
                <i class="fab fa-whatsapp-square"></i>
            </a>
        </div> 
    </div>
</div>
@endsection
