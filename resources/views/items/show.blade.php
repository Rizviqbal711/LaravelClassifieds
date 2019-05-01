@extends('layout')

@section('title',  $item->title)

@section('content')
<div class="container">
    <h1>
        {{ $item->title }}
    </h1>
    <div>
        {{ $item->description}}
    </div>
    <p>
        <a href="/items/{{ $item->id }}/edit" class="btn btn-success">
            Edit
        </a>
    </p>
</div>
@endsection
