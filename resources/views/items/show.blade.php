@extends('layout')

@section('title',  $item->item_title)

@section('content')
<div class="container" style="margin-top: 100px; min-height: 68vh;">
    <div class="row">
        <div class="col-md-7">
            <div>
                <div class="d-inline-block">
                    <h1>{{ $item->item_title }} <small> - {{ rand($item->item_min_price, $item->item_max_price)}} </small></h1> 
                </div>
                @if(Auth::user())
                    <!--       @if(Auth::user()->id == $item->user_id) -->
                        <div class="d-inline-block">
                            <a href="/items/{{ $item->id }}/edit" class="btn btn-sm btn-success">
                            Edit
                            </a>
                        </div>
                    <!-- @endif -->
                    @endif
                </div>
            <div>
                <img src="{{ asset('images/000000.png') }}">
            </div>
        </div>
        <div  class="col-md-5">
            <div class="align-top mt-5">
                <h3><u>Description</u></h3>
                {{ $item->item_description}}
            </div>
            <div class="text-muted location">
                <u>Location</u><br>
                {{ $item->item_area}}
            </div>
        </div> 
    </div>
</div>
@endsection
