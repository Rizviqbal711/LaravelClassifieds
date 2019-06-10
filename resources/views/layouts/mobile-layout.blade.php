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
	@yield('content')

	<footer class="fixed-bottom bg-white footer">
		<div class="container-fluid d-flex align-items-center footer">
			<div class="col text-center">
				<a href="/" class="green">
					<div class="footer-link">
						<i class="fas fa-home"></i>
					</div>
					Home
				</a>
			</div>
			<div class="col text-center">
				<a href="/search" class="green">
					<div class="footer-link">
						<i class="fas fa-search"></i>
					</div>
					Search
				</a>
			</div>
			<div class="col text-center">
				<a href="/list" class="green">
					<div class="footer-link">
						<i class="fas fa-plus"></i>
					</div>
					List
				</a>
			</div>
			<div class="col text-center">
				<a href="/profile" class="green">
					<div class="footer-link">
						<i class="fas fa-user"></i>
					</div>
					Profile
				</a>
			</div>
		</div>
	</footer>

	<!-- Scripts -->
 	<script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script>
	<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
</body>
</html>