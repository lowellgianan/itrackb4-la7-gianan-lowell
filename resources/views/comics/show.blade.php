@extends('layouts.app')

@section('title', $comic['title'])

@section('content')

    <div class="mb-3">
        <a href="{{ route('comics.index') }}" class="btn btn-sm btn-outline-secondary">
            ← Back to Comics List
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>{{ $comic['title'] }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Author:</strong> {{ $comic['author'] }}</p>
            <p><strong>Genre:</strong> {{ $comic['genre'] }}</p>
            <p><strong>Year Released:</strong> {{ $comic['year'] }}</p>
            <p><strong>Status:</strong> 
                @if ($comic['is_complete'])
                    <span class="badge bg-success">Complete</span>
                @else
                    <span class="badge bg-warning text-dark">Ongoing</span>
                @endif
            </p>
        </div>
    </div>

@endsection