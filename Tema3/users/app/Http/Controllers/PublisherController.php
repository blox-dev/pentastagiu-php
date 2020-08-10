<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\PublisherStoreRequest;
use App\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    private function getPublishers()
    {
        return Publisher::paginate(10);
    }

    public function index(){
        return view('publishers/publisher_index',['publishers' => $this->getPublishers()]);
    }

    public function create()
    {
        return view('publishers/publisher_create');
    }
    public function store(PublisherStoreRequest $request)
    {
        $publisher = new Publisher([
            'name' => $request->name,
        ]);

        $publisher->save();

        return redirect('/publishers');
    }
    public function edit()
    {
        $id = request('id');

        $publisher = Publisher::where('id',$id)->first();

        return view('publishers/publisher_edit',['publisher'=>$publisher]);
    }
    public function update(PublisherStoreRequest $request)
    {
        $publisher = Publisher::find($request->id);

        $publisher->name = $request->name;

        $publisher->save();

        return redirect('/publishers');
    }
    public function delete()
    {
        $id = request('id');

        Publisher::where("id",$id)->delete();
        Book::where("publisher_id",$id)->delete();

        return redirect('/publishers');
    }
}
