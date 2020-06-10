<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Shows a list of authors
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function auhthorsList()
    {
        $authors = App\Author::all();

        return $authors;
    }

    /**
     * Shows a list of books
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function booksList()
    {
        $books = App\Book::all();

        return $books;
    }

    /**
     * Show all books of the author
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function authorsBooks($id)
    {
        $books = App\Book::where('author_id', $id)->get();

        return $books;
    }
}
