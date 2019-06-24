@extends('layouts.mobile-layout')

@section('content')
   	@guest
   	<ul class="list-group">
   		<li class="list-group-item green">
			<i class="fas fa-key"></i>&nbsp;
   			<a href="{{ route('login') }}" class="text-dark">{{__('Login')}}</a>
   		</li>
   	</ul>
   	@else
	<ul class="list-group">
		<li class="list-group-item green">
			<i class="fas fa-user"></i>&nbsp;
			<a href="/profile" class="text-dark">Account</a>
		</li>
		<li class="list-group-item green">
			<i class="fas fa-list"></i>&nbsp;
			<a href="/myitems" class="text-dark">My Items</a>
		</li>
		<li class="list-group-item green">
			<i class="fas fa-gift"></i>&nbsp;
			<a href="/rewards" class="text-dark">Your Rewards</a>
		</li>
		<li class="list-group-item green">
			<i class="fas fa-award"></i>&nbsp;
			<a href="/referral" class="text-dark">Free Points</a>
		</li>
		<li class="list-group-item green">
			<i class="fas fa-key"></i>&nbsp;
			<a href="{{ route('logout') }}" class="text-dark" onclick="event.preventDefault();
               	document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                	@csrf
               	</form>
             </a>
		</li>
	</ul>
	@endguest
	<ul class="list-group mt-4">
		<li class="list-group-item green">
			<i class="fas fa-info-circle"></i>&nbsp;
			<a href="/m/about" class="text-dark">About</a>
		</li>	
		<li class="list-group-item green">
			<i class="fas fa-info-circle"></i>&nbsp;
			<a href="/terms" class="text-dark">Terms And Conditions</a>
		</li>
		<li class="list-group-item green">
			<i class="fas fa-info-circle"></i>&nbsp;
			<a href="/privacy" class="text-dark">Privacy Policy</a>
		</li>
	</ul>
@endsection