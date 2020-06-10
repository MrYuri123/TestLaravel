<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Show all users books
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getList()
    {
    	$books = App\Book::where('user_id', Auth::id())->get();

    	return $books;
    }

    /**
     * Create book
     *
     * @return boolean
     */
    public function createBook(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|max:255',
            'annotation'  => 'required|max:1000',
            'pages_count' => 'required|integer',
            'image'       => 'file|size:512',
            'author_id'   => 'required|integer'
        ]);

        $book = new App\Book();

        $book->title       = $request->title;
        $book->annotation  = $request->annotation;
        $book->pages_count = $request->pages_count;
        $book->image       = base64_encode($request->image);
        $book->author_id   = $request->author_id;
        $book->user_id     = Auth::id();

        if ($book->save()) {
        	return true;
        }

        return false;
    }

    /**
     * Edit book
     *
     * @return boolean
     */
    public function editBook(Request $request)
    {
        $book = App\Book::find($request->id);

        if ($book->user_id != Auth::id()) {
        	return false;
        }

        $validatedData = $request->validate([
            'title'       => 'required|max:255',
            'annotation'  => 'required|max:1000',
            'pages_count' => 'required|integer',
            'image'       => 'file|size:512',
            'author_id'   => 'required|integer'
        ]);

        $book->title       = $request->title;
        $book->annotation  = $request->annotation;
        $book->pages_count = $request->pages_count;
        $book->image       = base64_encode($request->image);
        $book->author_id   = $request->author_id;

        if ($book->save()) {
        	return true;
        }

        return false;
    }

    /**
     * Delete book
     *
     * @return boolean
     */
    public function deleteBook(Request $request)
    {
        $book = App\Book::find($request->id);

        if ($book->user_id != Auth::id()) {
        	return false;
        }

        if ($book->delete()) {
        	return true;
        }

        return false;
    }
}
