<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComicController extends Controller
{

    public function index()
    {
        return view('comics.index', ['comics' => $this->comics()]);
    }

    public function show($id)
    {
        $comics = $this->comics();

        if (!isset($comics[$id])) {
            abort(404);
        }

        return view('comics.show', ['comic' => $comics[$id]]);
    }

    public function filter($genre = null)
    {
        $comics = $this->comics();

        if ($genre === null) {
            return view('comics.filter', [
                'comics' => $comics,
                'genre' => null
            ]);
        } else {
            $filteredComics = array_filter($comics, function ($comic) use ($genre) {
                return strtolower($comic['genre']) === strtolower($genre);
            });

            return view('comics.filter', [
                'comics' => $filteredComics,
                'genre' => $genre
            ]);
        }
    }

    private function comics()
    {
        return [
         1 => ['id' => 1, 'title' => 'Demon Slayer', 'author' => 'Koyoharu Gotouge', 'genre' => 'Action', 'chapter' => 205, 'is_complete' => true],
         2 => ['id' => 2, 'title' => 'My Hero Academia', 'author' => 'Kohei Horikoshi', 'genre' => 'Superhero', 'chapter' => 430, 'is_complete' => true],
         3 => ['id' => 3, 'title' => 'Jujutsu Kaisen', 'author' => 'Gege Akutami', 'genre' => 'Dark Fantasy', 'chapter' => 271, 'is_complete' => false],
         4 => ['id' => 4, 'title' => 'Bleach', 'author' => 'Tite Kubo', 'genre' => 'Action', 'chapter' => 686, 'is_complete' => true],
         5 => ['id' => 5, 'title' => 'Fullmetal Alchemist', 'author' => 'Hiromu Arakawa', 'genre' => 'Adventure', 'chapter' => 108, 'is_complete' => true],  
         6 => ['id' => 6, 'title' => 'Demon Slayer', 'author' => 'Koyoharu Gotouge', 'genre' => 'Action', 'chapter' => 205, 'is_complete' => true],
         
        ];
    }
}
