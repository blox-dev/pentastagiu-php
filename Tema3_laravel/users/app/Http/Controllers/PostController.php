<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show($title)
    {
        //$posts = DB::table('posts')->where('title', $title)->first();

        $posts = [
          'my-first-post' => 'here I am',
          'my-second-post' => 'second post'
        ];

        if(!array_key_exists($title, $posts)){
            abort(404,"no route found");
        }

        return view('post', [
            'post' => $posts[$title]
        ]);
    }
}
