<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Publisher;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private function getAuthors()
    {
        return Author::all();
    }

    public function index(){
        return view('author_index',['authors' => $this->getAuthors()]);
    }

    public function create()
    {
        return view('create_tpl',['thing'=>'author',
                                'text_input' => ['name']
        ]);
    }
    public function store(Request $request)
    {
        $author = new Author([
            'name' => $request->name,
            ]);

        $author->save();

        return view('author_index',['authors' => $this->getAuthors()]);
    }
    public function delete()
    {
        $id = request('id');

        Author::where("id",$id)->delete();
        Book::where("author_id",$id)->delete();

        return view('author_index',['authors' => $this->getAuthors()]);
    }
}
