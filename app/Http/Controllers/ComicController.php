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

        $allComics = $this->comics();
        $comics = [];

        foreach ($allComics as $comic) {
            $matchesGenre = ($genre === 'all' || $comic['genre'] === $genre);
            $matchesYear = ($year === 'all' || (string)$comic['year'] === (string)$year);

            if ($matchesGenre && $matchesYear) {
                $comics[] = $comic;
            }
        }

        return view('comics.index', [
            'comics' => $comics,
            'genre' => $genre,
            'year' => $year,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comics = $this->comics();

        if (!isset($comics[$id])) {
            abort(404);
        }

        return view('comics.show', ['comic' => $comics[$id]]);
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

        return view('comics.feature', ['comic' => $comics[1]]);
    }

    /**
     * Private helper returning the list of comics.
     */
    private function comics()
    {
        return [
            1 => ['id' => 1, 'title' => 'One Piece', 'author' => 'Eiichiro Oda', 'genre' => 'Adventure', 'year' => '1997', 'is_complete' => false],
            2 => ['id' => 2, 'title' => 'Attack on Titan', 'author' => 'Hajime Isayama', 'genre' => 'Dark Fantasy', 'year' => '2009', 'is_complete' => true],
            3 => ['id' => 3, 'title' => 'Chainsaw Man', 'author' => 'Tatsuki Fujimoto', 'genre' => 'Action', 'year' => '2018', 'is_complete' => false],
            4 => ['id' => 4, 'title' => 'Naruto', 'author' => 'Masashi Kishimoto', 'genre' => 'Action', 'year' => '1999', 'is_complete' => true],
            5 => ['id' => 5, 'title' => 'Death Note', 'author' => 'Tsugumi Ohba', 'genre' => 'Psychological', 'year' => '2003', 'is_complete' => true],
            6 => ['id' => 6, 'title' => 'Spy x Family', 'author' => 'Tatsuya Endo', 'genre' => 'Comedy', 'year' => '2019', 'is_complete' => false],
        ];
    }
}