@extends('layouts.app')

@section('title', 'Comic Recommendations')

@section('content')

    <h2 class="mb-3">List of Recommendations</h2>

    <!-- Add Comic Button -->
    <div class="mb-3">
        <a href="{{ route('comics.create') }}" class="btn btn-primary">
            Add Comic
        </a>
    </div>

    <!-- Success Message Alert (lalabas kapag nakapag-add ng bagong comic) -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Active Filters Badge -->
    <div class="alert alert-light border d-flex justify-content-between align-items-center mb-3">
        <div>
            <span class="text-muted">Active filters:</span>
            <span class="badge bg-primary">Genre: {{ $genre }}</span>
            <span class="badge bg-primary">Year: {{ $year }}</span>
        </div>
        <a href="{{ route('comics.index') }}" class="btn btn-sm btn-outline-secondary">Clear all</a>
    </div>

    <!-- Filter by Genre -->
    <div class="mb-3">
        <strong class="me-2">Genre:</strong>
        <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('comics.index', ['genre' => 'all', 'year' => $year]) }}"
               class="btn {{ $genre === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
            <a href="{{ route('comics.index', ['genre' => 'Adventure', 'year' => $year]) }}"
               class="btn {{ $genre === 'Adventure' ? 'btn-primary' : 'btn-outline-primary' }}">Adventure</a>
            <a href="{{ route('comics.index', ['genre' => 'Dark Fantasy', 'year' => $year]) }}"
               class="btn {{ $genre === 'Dark Fantasy' ? 'btn-primary' : 'btn-outline-primary' }}">Dark Fantasy</a>
            <a href="{{ route('comics.index', ['genre' => 'Action', 'year' => $year]) }}"
               class="btn {{ $genre === 'Action' ? 'btn-primary' : 'btn-outline-primary' }}">Action</a>
            <a href="{{ route('comics.index', ['genre' => 'Psychological', 'year' => $year]) }}"
               class="btn {{ $genre === 'Psychological' ? 'btn-primary' : 'btn-outline-primary' }}">Psychological</a>
            <a href="{{ route('comics.index', ['genre' => 'Comedy', 'year' => $year]) }}"
               class="btn {{ $genre === 'Comedy' ? 'btn-primary' : 'btn-outline-primary' }}">Comedy</a>
        </div>
    </div>

    <!-- Filter by Year -->
    <div class="mb-4">
        <strong class="me-2">Year:</strong>
        <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('comics.index', ['genre' => $genre, 'year' => 'all']) }}"
               class="btn {{ $year === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
            <a href="{{ route('comics.index', ['genre' => $genre, 'year' => '1997']) }}"
               class="btn {{ $year === '1997' ? 'btn-primary' : 'btn-outline-primary' }}">1997</a>
            <a href="{{ route('comics.index', ['genre' => $genre, 'year' => '1999']) }}"
               class="btn {{ $year === '1999' ? 'btn-primary' : 'btn-outline-primary' }}">1999</a>
            <a href="{{ route('comics.index', ['genre' => $genre, 'year' => '2003']) }}"
               class="btn {{ $year === '2003' ? 'btn-primary' : 'btn-outline-primary' }}">2003</a>
            <a href="{{ route('comics.index', ['genre' => $genre, 'year' => '2009']) }}"
               class="btn {{ $year === '2009' ? 'btn-primary' : 'btn-outline-primary' }}">2009</a>
            <a href="{{ route('comics.index', ['genre' => $genre, 'year' => '2018']) }}"
               class="btn {{ $year === '2018' ? 'btn-primary' : 'btn-outline-primary' }}">2018</a>
            <a href="{{ route('comics.index', ['genre' => $genre, 'year' => '2019']) }}"
               class="btn {{ $year === '2019' ? 'btn-primary' : 'btn-outline-primary' }}">2019</a>
        </div>
    </div>

    <!-- Comics Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comics as $comic)
                <tr>
                    <td>
                        <a href="{{ route('comics.show', ['comic' => $comic['id']]) }}">
                            {{ $loop->iteration }}
                        </a>
                    </td>
                    <td>{{ $comic['title'] }}</td>
                    <td>{{ $comic['author'] }}</td>
                    <td>
                        {{ $comic['year'] }}
                        @if ($comic['year'] >= 2015)
                            <span class="badge bg-primary">Modern</span>
                        @else
                            <span class="badge bg-primary">Classic</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('comics.index', ['genre' => $comic['genre'], 'year' => $year]) }}">
                            {{ $comic['genre'] }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Comics Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection