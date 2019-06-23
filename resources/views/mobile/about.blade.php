@extends('layouts.mobile-layout')

@section('content')
<div class="section-1">
    <h3 class="text-center">
        Why QuickList?
    </h3>
    <div class="section-1-container container mt-4">
        <div class="row text-center">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12">
                        <img src="{{ asset('images/website.png') }}" width="60">
                            <h4 class="mt-3">
                                Join
                            </h4>
                            <p>
                                Be a part of Dubai’s simplest, speediest and friendliest online marketplace.
                            </p>
                       
                    </div>
                    <div class="col-sm-12">
                        <img src="{{ asset('images/list.png') }}" width="60">
                            <h4 class="mt-3">
                                List
                            </h4>
                            <p>
                                Post your items in seconds.
                            </p>
   
                    </div>
                    <div class="col-sm-12">
                        <img src="{{ asset('images/browse.png') }}" width="60">
                            <h4 class="mt-3">
                                Browse
                            </h4>
                            <p>
                                Find just what you want at great prices.
                            </p>
                        
                    </div>
                    <div class="col-sm-12">
                        <img src="{{ asset('images/gift.png') }}" width="60">
                            <h4 class="mt-3">
                                Win
                            </h4>
                            <p>
                                Free raffles for exiting prices every weekend!
                                <br>
                                    Login to find out more.
                               
                            </p>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-2 mt-4">
	 <h3 class="text-center">
        Join the QuickList Family!
    </h3>
    <div class="section-2-container container mt-4">
    	<div class="row text-center">
		    <div class="card">
		    	<div class="card-body">
	    			<p>Quicklist is an innovative and intelligent digital classifieds platform developed to transform online buying and selling in Dubai... And it’s FREE! Using Quicklist is beautifully quick and easy – and there are no annoying commercials to get in your way. You can chat securely on WhatsApp via Quicklist with a buyer or seller. Plus, a brand new smart pricing feature helps you to sell or buy your items for the right price. Sorted!</p>
	    			<h4 class="mt-4">SMART PRICING means everyone’s happy!</h4>
	    			<p>Quicklist’s own smart and flexible pricing algorithm adds fun and value to every transaction.</p>
	    			<ol class="text-left">
	    				<li>A seller gives Quicklist a minimum (and an optional maximum) price they want for their item.</li>
	    				<li>Within that range, the Quicklist algorithm varies the price every 24 hours.</li>
	    				<li>The buyer has fun deciding when to buy – and what price makes them happy!</li>
	    				<li>Sellers have the freedom to offer discounts if they wish.</li>
	    			</ol>
	    			<h4 class="mt-4">Unleash the fun!</h4>
	    			<p>Watch Now.</p>
	    			<div class="embed-responsive embed-responsive-16by9 video">
                		<iframe width="640" height="360" src="https://www.youtube.com/embed/ty6bRi9w4S4?rel=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
            		</div>  
            		<div class="text-center mt-4">
                		<a href="/list" class="btn btn-success btn-md "> Start listing now. It’s absolutely FREE!</a>    
            		</div>            		
	    		</div>
	    	</div>
    	</div>

    </div>
</div>
@endsection
