<?php

namespace App\Http\Controllers;

use App\Book;
use App\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    private function getPublishers()
    {
        return Publisher::all();
    }

    public function index(){
        return view('index_tpl',['thing'=>'publisher', 'publishers' => $this->getPublishers()]);
    }

    public function create()
    {
        return view('create_tpl',['thing'=>'publisher',
            'text_input' => ['name']
        ]);
    }
    public function store(Request $request)
    {
        $publisher = new Publisher([
            'name' => $request->name,
        ]);

        $publisher->save();

        return view('index_tpl',['thing'=>'publisher', 'publishers' => $this->getPublishers()]);
    }
    public function edit()
    {
        $id = request('id');

        $publisher = Publisher::where('id',$id)->first();

        return view('edit_tpl',[
            'thing'=>'publisher',
            'publisher'=>$publisher,
            'text_input' => ['name']
        ]);
    }
    public function update(Request $request)
    {
        $publisher = Publisher::find($request->id);

        $publisher->name = $request->name;

        $publisher->save();

        return view('index_tpl',['thing'=>'publisher', 'publishers' => $this->getPublishers()]);
    }
    public function delete()
    {
        $id = request('id');

        Publisher::where("id",$id)->delete();
        Book::where("publisher_id",$id)->delete();

        return view('index_tpl',['thing'=>'publisher', 'publishers' => $this->getPublishers()]);
    }
}
