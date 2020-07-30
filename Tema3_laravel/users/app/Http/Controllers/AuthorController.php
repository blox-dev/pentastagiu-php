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
        return view('index_tpl',['thing'=>'author', 'authors' => $this->getAuthors()]);
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

        return view('index_tpl',['thing'=>'author', 'authors' => $this->getAuthors()]);
    }
    public function edit()
    {

    }
    public function delete()
    {
        $id = request('id');

        Author::where("id",$id)->delete();
        Book::where("author_id",$id)->delete();

        return view('index_tpl',['thing'=>'author', 'authors' => $this->getAuthors()]);
    }
}
