@extends('layouts.layout')

@section('title', 'My Profile')

@section('content')
<div class="container col-md-3 myitem-content">
	<h1 class="text-center">My Profile</h1>

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
    		<input type="tel"  class="form-control" name="phone" placeholder="888-888-8888" title="XXX-XXX-XXXX"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{ $this_user->phone }}">
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


@endsection