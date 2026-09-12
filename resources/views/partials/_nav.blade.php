<nav class="nav mb-3">
    <a class="nav-link" href="{{ route('comics.index') }}">
        Comics
    </a>

    <a class="nav-link" href="{{ route('comics.featured') }}">
        Featured
    </a>

    <a class="nav-link" href="{{ route('comics.filter') }}">
        Filter
    </a>

    <a class="nav-link" href="{{ route('comics.show', ['comic' => 1]) }}">
        Comic #1
    </a>
</nav>