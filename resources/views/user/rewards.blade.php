@extends('layouts.layout')

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
		<p>
			How does this Work?
		</p>
		<p>
			Everytime a user <b>Registers</b> or <b>List their item</b> with QuickList they are rewarded with a set amount of points. One point represents one ticket at the raffle. The breakdown of points of points is shown below
			<ul>
				<li>Registration: 5 points</li>
				<li>Listing your Item: 10 points</li>
			</ul>
			At the end of every week, you will be in the raffle draw with the amount of tickets(points) you have and you can have a chance to win exciting prizes.
		</p>
		<p>The higher the points, the higher th chance for you to win so start <b>QuickListing</b></p>
	</div>
</div>
@endsection