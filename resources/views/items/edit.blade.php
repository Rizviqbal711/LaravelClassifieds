@extends('layout')

@section('title' , 'Edit Item')

@section('content')

	<h1>Edit Item</h1>

	<form method="POST" action="/items/{{ $item->id }}">
		
		@method('PATCH')
		@csrf

		<div>
			<input type="text" name="title" value="{{ $item->title }}">
		</div>
		<div>
			<textarea name="description">{{ $item->description }}</textarea>
		</div>
		<div>
			<button type="submit">Update</button>
		</div>
	</form>

	<form method="POST" action="/items/{{ $item->id }}">
		
		@method('DELETE')
		@csrf

		<div>
			<button type="submit">Delete</button>
		</div>
	</form>


@endsection