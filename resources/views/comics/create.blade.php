@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add New Comic</h2>

    <form action="{{ route('comics.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title"
                class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author"
                class="form-control" value="{{ old('author') }}" required>
            @error('author')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" id="genre"
                class="form-control" value="{{ old('genre') }}" required>
            @error('genre')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Release Year</label>
            <input type="number" name="year" id="year"
                class="form-control" value="{{ old('year') }}" placeholder="e.g. 2019" required>
            @error('year')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_complete" id="is_complete"
                class="form-check-input" value="1" {{ old('is_complete') ? 'checked' : '' }}>
            <label for="is_complete" class="form-check-label">Is Completed?</label>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Comic
        </button>

        <a href="{{ route('comics.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection