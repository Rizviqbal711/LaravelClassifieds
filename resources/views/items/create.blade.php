@extends('layout')


@section('title', 'Add Item')


@section('content')
	<h1> Add Items</h1>

	<form method="POST" action="/items">
		{{ csrf_field() }}
		<div>
			<input type="text" name="title" placeholder="Title" value="{{ old('title') }}">
		</div>
		<div>
			
			<textarea name="description" placeholder="Description">{{ old('description') }}</textarea>
		</div>
		<div>
			<button type="submit">Submit</button>
		</div>
	</form>

	@if ($errors->any())

		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)

					<li>{{ $error }}</li>

				@endforeach
			</ul>
		</div>
	@endif
@endsection
