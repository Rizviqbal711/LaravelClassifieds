@extends('layouts.mobile-layout')

@section('title' , 'QuickList')

@section('content')
<hr class="no-margin">
	<div class="categories">
		<div class="container-fluid">
			<?php $count = 0 ?>
			@foreach($categories as $category)
			<div class="one-category d-inline-block p-3 text-center">
				<i class="fas fa-laptop"></i><br>
				{{ $category->category_name }}
			</div>
			<?php $count++ ?>
			@if ($count % 2 == 0)
			<br>
			@endif
			@endforeach
		</div>
	</div>
	<hr class="no-margin">
	<div class="items">
		<div class="container-fluid">
			<h4>Recommendations</h4>
			<?php $count = 0 ?>
			<div class="row justify-content-center all-items">
			@foreach($items as $item)
			<div class="d-inline-block one-item">
				<a href="/items/{{ $item->id }}">
					<div class="item-image">
						<img src="{{asset('uploads') .'/'. $item->item_primary_image}}" width="100%">
					</div>	
					<hr>
					<div class="item-desc">
						<span class="text-success">{{$item->item_title}}</span>
						<br>
						<small class="text-success">{{ germanizer($item->item_min_price, $item->item_max_price, date('w') + 1)}} AED</small>

						<small>
							<div class="text-muted">
                         		<i class="fas fa-layer-group"></i>
                                {{ $item->category->category_name }}
                            </div>
                           
                            <div class="text-muted location">
                             	<i class="fas fa-map-marker-alt"></i>
                                	{{ $item->item_area}} > {{ $item->item_city}}
                            </div>
						</small>
					</div>
				</a>
			</div>
			<?php $count++ ?>
			@endforeach
			
			</div>
		</div>
	</div>
@endsection

