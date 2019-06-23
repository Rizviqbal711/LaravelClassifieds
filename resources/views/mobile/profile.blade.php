@extends('layouts.mobile-layout')

@section('content')
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
			<a href="/rewards" class="text-dark">	Your Rewards</a>
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
@endsection