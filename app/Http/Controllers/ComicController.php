<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('comics.index', ['comics' => $this->comics()]);
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

        if (!isset($comics[$id]))
        {
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

    public function featured()
    {
        $comics = $this->comics();
        $comic = $comics[1];

        return view('comics.featured', ['comic' => $comic]);
    }

    public function filter($genre = null)
    {
        $comics = $this->comics();

        if ($genre === null) {
            return view('comics.filter', ['comics' => $comics, 'genre' => null]);
        }

        $filteredComics = [];

        foreach ($comics as $comic) {
            if (strcasecmp($comic['genre'], $genre) === 0) {
                $filteredComics[] = $comic;
            }
        }

        return view('comics.filter', ['comics' => $filteredComics, 'genre' => $genre]);
    }

    private function comics()
    {
        return [
            1 => ['id' => 1, 'title' => 'One Piece', 'author' => 'Eiichiro Oda', 'genre' => 'Adventure', 'chapter' => 1120, 'is_complete' => false],
            2 => ['id' => 2, 'title' => 'Attack on Titan', 'author' => 'Hajime Isayama', 'genre' => 'Dark Fantasy', 'chapter' => 139, 'is_complete' => true],
            3 => ['id' => 3, 'title' => 'Chainsaw Man', 'author' => 'Tatsuki Fujimoto', 'genre' => 'Action', 'chapter' => 175, 'is_complete' => false],
            4 => ['id' => 4, 'title' => 'Naruto', 'author' => 'Masashi Kishimoto', 'genre' => 'Action', 'chapter' => 700, 'is_complete' => true],
            5 => ['id' => 5, 'title' => 'Death Note', 'author' => 'Tsugumi Ohba', 'genre' => 'Psychological', 'chapter' => 108, 'is_complete' => true],
            6 => ['id' => 6, 'title' => 'Spy x Family', 'author' => 'Tatsuya Endo', 'genre' => 'Comedy', 'chapter' => 100, 'is_complete' => false],
        ];
    }
}