<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
         <!-- CSRF Token -->
        <meta content="{{ csrf_token() }}" name="csrf-token">
        <title>
            @yield('title')
        </title>
        <link href="{{ asset('images/icon.png') }}" rel="icon" type="image/x-icon">
        <!-- Fonts -->
        <link href="//fonts.gstatic.com" rel="dns-prefetch">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- CSS -->
        <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" rel="stylesheet">

        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <link href="/css/privacy.css" rel="stylesheet" type="text/css"/>
        <link href="/css/mobile.css" rel="stylesheet" type="text/css"/>

        <!-- Scripts -->
        <script  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
        <script src="{{ asset('js/privacy.js') }}"></script>


</head>
<body class="eupopup eupopup-bottom eupopup-style-compact">
	@include('include.mobile-navbar')
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
			<div class="row justify-content-center">
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

	<!-- Scripts -->
 	<script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script>
	<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
</body>
</html>