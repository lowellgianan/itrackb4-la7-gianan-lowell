<nav class="navbar navbar-expand-lg navbar-light text-bg-light p-2">
    <a class="nav-link p-3" href="{{ route('comics.index') }}">Comics</a>
    <a class="nav-link p-3" href="{{ route('comics.filter') }}">Filter</a>
    <a class="nav-link p-3" href="{{ route('comics.show', ['id' => 1]) }}">Show</a>
</nav>
