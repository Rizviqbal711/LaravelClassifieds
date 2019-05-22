@extends('layout')

@section('title',  $item->item_title)

@section('content')
<div class="container" style="margin-top: 100px; min-height: 68vh;">
    <div class="row">
        <div class="col-md-7">
            <div>
                <div class="d-inline-block">
                    <h1>{{ $item->item_title }} <small> - <span class="text-success">{{ germanizer($item->item_min_price, $item->item_min_price, date('w') + 1)}} AED</span></small></h1> 
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
                <div class="text-muted user">
                    <i class="fas fa-user"></i>
                    {{ $item->user->name }}
                </div>
                <div class="text-muted location">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $item->item_area}} > {{ $item->item_city}}
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
