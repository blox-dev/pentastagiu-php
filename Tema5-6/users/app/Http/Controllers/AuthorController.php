<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\AuthorStoreRequest;
use App\Publisher;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private function getAuthors()
    {
        return Author::paginate(10);
    }

    public function index(){
        return view('authors/author_index',['authors' => $this->getAuthors()]);
    }

    public function create()
    {
        return view('authors/author_create');
    }
    public function store(AuthorStoreRequest $request)
    {
        $author = new Author([
            'name' => $request->name,
            ]);

        $author->save();

        return redirect('/authors');
    }
    public function edit()
    {
        $id = request('id');

        $author = Author::where('id',$id)->first();

        return view('authors/author_edit',['author'=>$author]);
    }
    public function update(AuthorStoreRequest $request)
    {
        $author = Author::find($request->id);

        $author->name = $request->name;

        $author->save();

        return redirect('/authors');
    }
    public function delete()
    {
        $id = request('id');

        Author::where("id",$id)->delete();
        Book::where("author_id",$id)->delete();

        return redirect('/authors');
    }
}
