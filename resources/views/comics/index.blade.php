@extends('layouts.app')

@section('title', 'Comics')

@section('content')
 
    <table class = "table table-striped mt-4" border="1" cellpadding="8">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Chapters</th>
            <th>Complete</th>
        </tr>
 
        @forelse ($comics as $comic)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('comics.show', [$comic['id']]) }}">{{ $comic['title'] }}</a></td>
                <td><a href="{{ route('comics.show', [$comic['id']]) }}">{{ $comic['author'] }}</a></td>
                <td>{{ $comic['genre'] }}</td>
                <td>{{ $comic['chapter'] }}</td>
                <td>{{ $comic['is_complete'] ? 'Yes' : 'No' }}</td>           
            </tr>
        @empty
            <tr>
                <td colspan="5">No comics found.</td>
            </tr>
        @endforelse

@endsection
