@php
    $isFeature = request()->is('comics/feature');
    $isFilter  = request()->is('comics/filter*');
    $isComics  = request()->is('comics', 'comics/*') && !$isFeature && !$isFilter;
@endphp

<nav class="mb-3">
    <a href="{{ route('comics.index') }}"
       class="btn btn-sm {{ $isComics ? 'btn-primary' : 'btn-secondary' }}">
        Comics
    </a>
    <a href="{{ route('comics.feature') }}"
       class="btn btn-sm {{ $isFeature ? 'btn-primary' : 'btn-secondary' }}">
        Featured
    </a>
    <a href="{{ route('comics.filter') }}"
       class="btn btn-sm {{ $isFilter ? 'btn-primary' : 'btn-secondary' }}">
        Filter
    </a>
</nav>