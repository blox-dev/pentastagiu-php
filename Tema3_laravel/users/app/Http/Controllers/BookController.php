<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private function getBooks()
    {
        $books = Book::all();

        foreach($books as $book)
        {
            $book['author_name'] = Author::with('book')->where('id',$book->author_id)->first()->name;
            $book['publisher_name']= Publisher::with('book')->where('id',$book->publisher_id)->first()->name;
        }

        return $books;
    }

    public function index()
    {
        return view('book_index',['books' => $this->getBooks()]);
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('book_create',['authors' => $authors, 'publishers' => $publishers]);
    }
   public function store(Request $request)
    {

        $book = new Book([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'publish_year' => $request->publish_year
        ]);

        $book->save();

        return view('book_index',['books' => $this->getBooks()]);
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        $id = request('id');

        $book = Book::all()->where('id',$id)->first();

        $authors = Author::all();
        $publishers = Publisher::all();

        return view('book_edit',['book'=>$book,'authors' => $authors, 'publishers' => $publishers]);
    }

    public function update(Request $request)
    {
        $book = Book::find($request->id);

        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->publish_year = $request->publish_year;

        $book->save();

        return view('book_index',['books' => $this->getBooks()]);
    }

    public function delete()
    {
        $id = request('id');

        Book::where("id",$id)->delete();

        return view('book_index',['books' => $this->getBooks()]);
    }
}
