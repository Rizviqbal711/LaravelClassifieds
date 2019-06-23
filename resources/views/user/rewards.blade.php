@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')

@section('title', 'Rewards | QuickList')

@section('content')
<div class="container myitem-content">
	<h1>
		Points
	</h1>
	<h1>
		You have {{ $rewards }} points
	</h1>
	<div class="mt-5">
		<h2>
			How does this Work?
		</h2>
		<div>
			Every week we hold a Grand Draw with an exciting, on-trend prize to be won by a lucky Quicklister! You’ll get a draw entry for every single point you earn!
			<br>
			Points for everyone:
			<ul>
				<li>
					<div class="row">
						<div class="col-md-3">
							Create your Quicklist account
						</div>
						<div class="col-md-3">
							10 points
						</div>
					</div>
				</li>
				<li>
					<div class="row">
						<div class="col-md-3">
							Create an ad
						</div>
						<div class="col-md-3">
							10 points
						</div>
					</div>
				</li>
				<li>
					<div class="row">
						<div class="col-md-3">
							Share an ad on your Facebook page
						</div>
						<div class="col-md-3">
							30 points
						</div>
					</div>
				</li>
				<li>
					<div class="row">
						<div class="col-md-3">
							Refer Quicklist to your friends
						</div>
						<div class="col-md-3">
							20 points per sign up
						</div>
					</div>
				</li>
			</ul>
			<br>
			Log in to Quicklist and earn more points!
			<ul>
				<li>
					<div class="row">
						<div class="col-md-3">
							Like the Quicklist Facebook page
						</div>
						<div class="col-md-3">
							3 points 
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection