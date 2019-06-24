@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')

@section('title', 'My Profile')

@section('content')
<div class="container col-md-3 myitem-content">
	<h1 class="text-center">My Profile</h1>
    <div class="card mt-4">
        <div class="card-body">
        <div class="text-center">
           <h5>
                General Information
           </h5> 
        </div>
        	<form action="/update/{{ $this_user->id }}" method="POST">
        		@method('PATCH')
        		@csrf
        		<div class="form-group">
                    <label>Name</label>
            		<input type="text" class="form-control" placeholder="Name" name="name" value="{{ $this_user->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
            		<input type="text" class="form-control" placeholder="Name" name="email" value="{{ $this_user->email }}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
            		<input type="tel"  class="form-control" name="phone" placeholder="9715XXXXXXX" title="9715XXXXXXX" value="{{ $this_user->phone }}">
                </div>
                <div class="form-group">
                    <label>Contact via Whatsapp</label><br>
                    <input type="radio"  class="" name="contact_whatsapp" value="1" {{ $this_user->contact_whatsapp == 1  ? 'checked' : ''}}> Yes
                    <input type="radio"  class="" name="contact_whatsapp" value="0" {{ $this_user->contact_whatsapp == 1  ? '' : 'checked'}}> No
                </div>
                <div class="form-group">
                    <div>
                        <button class="btn btn-success col-md-12" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
        	</form>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="text-center">
                <h5>
                    My Places
                </h5>
            </div>
            <button class="btn btn-success col-md-12 " id="place-button">+ Add Place</button>
            <div class="place-form mt-3">
                <form action="/location" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Location Name</label>
                        <input type="text" class="form-control" placeholder="Home, Work" name="user_location_name" >
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="Dubai" name="user_location_city" >
                    </div>
                    <div class="form-group">
                        <label>Area</label>
                        <input type="text" class="form-control" placeholder="Al Nahda 2, Qusais" name="user_location_area" >
                    </div>
                    <div id="map"></div>
                    <span class="btn btn-primary col-md-12 location-click">Get location</span>
                    <div>
                        <button class="btn btn-success col-md-12">Submit</button>
                    </div>
                </form>
            </div>
            <div class="my-places">
                @foreach($locations as $lcn)
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="float-left">
                                {{$lcn->user_location_name}}
                                <div>
                                    <small>
                                        {{$lcn->user_location_area}}, {{$lcn->user_location_city}}
                                    </small>
                                </div>
                            </div>
                            <div class="float-right">
                                <form action="/location/{{$lcn->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class=" btn btn-danger btn-sm col-md-12"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@forelse(auth()->user()->getReferrals() as $referral)
        <h4>
            {{ $referral->program->name }}
        </h4>
        <code>
            {{ $referral->link }}
        </code>
        <p>
            Number of referred users: {{ $referral->relationships()->count() }}
        </p>
    @empty
        No referrals
    @endforelse



@endsection