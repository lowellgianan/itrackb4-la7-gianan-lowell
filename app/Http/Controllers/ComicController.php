<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genre = $request->query('genre', 'all');
        $year = $request->query('year', 'all');

        $comics = collect($this->comics())
            ->when($genre !== 'all' && $genre !== '', function ($query) use ($genre) {
                return $query->where('genre', $genre);
            })
            ->when($year !== 'all' && $year !== '', function ($query) use ($year) {
                return $query->where('year', (string) $year);
            })
            ->values();

        return view('comics.index', [
            'comics' => $comics,
            'genre'  => $genre,
            'year'   => $year,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'genre'       => 'required|string|max:255',
            'year'        => 'required|numeric',
            'is_complete' => 'nullable|boolean',
        ]);

        $validated['is_complete'] = $request->boolean('is_complete');

        $comics = $this->comics();

        $nextId = empty($comics)
            ? 1
            : max(array_column($comics, 'id')) + 1;

        $validated['id'] = $nextId;

        $comics[] = $validated;

        $this->saveComics($comics);

        return redirect()
            ->route('comics.index')
            ->with('success', 'Comic added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comics = $this->comics();

        $comic = collect($comics)->firstWhere('id', (int) $id);

        if (!$comic) {
            abort(404);
        }

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Display a featured resource.
     */
    public function feature()
    {
        $comics = $this->comics();

        $comic = collect($comics)->firstWhere('id', 1);

        if (!$comic) {
            abort(404);
        }

        return view('comics.feature', compact('comic'));
    }

    /**
     * Private helper returning the list of comics.
     */
    private function comics()
    {
        return $this->getComics();
    }

    /**
     * Get comics from JSON storage.
     */
    private function getComics()
    {
        $path = storage_path('app/comics.json');

        if (!file_exists($path)) {
            $defaultComics = [
                ['id' => 1, 'title' => 'One Piece', 'author' => 'Eiichiro Oda', 'genre' => 'Adventure', 'year' => '1997', 'is_complete' => false],
                ['id' => 2, 'title' => 'Attack on Titan', 'author' => 'Hajime Isayama', 'genre' => 'Dark Fantasy', 'year' => '2009', 'is_complete' => true],
                ['id' => 3, 'title' => 'Chainsaw Man', 'author' => 'Tatsuki Fujimoto', 'genre' => 'Action', 'year' => '2018', 'is_complete' => false],
                ['id' => 4, 'title' => 'Naruto', 'author' => 'Masashi Kishimoto', 'genre' => 'Action', 'year' => '1999', 'is_complete' => true],
                ['id' => 5, 'title' => 'Death Note', 'author' => 'Tsugumi Ohba', 'genre' => 'Psychological', 'year' => '2003', 'is_complete' => true],
                ['id' => 6, 'title' => 'Spy x Family', 'author' => 'Tatsuya Endo', 'genre' => 'Comedy', 'year' => '2019', 'is_complete' => false],
            ];

            $this->saveComics($defaultComics);

            return $defaultComics;
        }

        return json_decode(
            file_get_contents($path),
            true
        ) ?? [];
    }

    /**
     * Save comics to JSON storage.
     */
    private function saveComics(array $comics)
    {
        $path = storage_path('app/comics.json');

        file_put_contents(
            $path,
            json_encode(array_values($comics), JSON_PRETTY_PRINT)
        );
    }
}