@extends('layouts.app')

@section('title', 'Featured Comic')

@section('content')
<div class="card p-4 m-4">
    <h2 class="h3 font-weight-bold mb-3">Comic: {{ $comic['title'] }}</h2>
    <p class="mb-2 fs-5"><strong>Author:</strong> {{ $comic['author'] }}</p>
    <p class="mb-2 fs-5"><strong>Genre:</strong> {{ $comic['genre'] }}</p>
    <p class="mb-2 fs-5"><strong>Chapters:</strong> {{ $comic['chapter'] }}</p>
    <p class="mb-0 fs-5"><strong>Complete:</strong> {{ $comic['is_complete'] ? 'Yes' : 'No' }}</p>
</div>

<div class="text-center mt-4">
    <a href="{{ url('/comics') }}" class="btn btn-secondary px-4 py-2">Back</a>
</div>
@endsection
