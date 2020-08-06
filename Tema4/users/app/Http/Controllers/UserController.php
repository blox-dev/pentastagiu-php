<?php

namespace App\Http\Controllers;

use App\Book;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        return User::paginate(10);
    }
    public function index()
    {
        return view('users/user_index',['users' => $this->getUsers()]);
    }
    public function create()
    {
        return view('users/user_create');
    }
    public function store(Request $request)
    {
        $username = $request->username;

        $user = User::where('username',$request->username)->get();

        if($user->isEmpty()) {
            $user = new User(['username' => $username]);
            $user->save();
        }

        $user = User::where('username',$request->username)->first();

        return redirect('/user/'.$user->id);
    }
    public function show($user_id)
    {
        $user = User::where('id',$user_id)->first();
        $user_books = User::where('id',$user_id)->with(['book.author','book.publisher'])->first();

        $books = Book::with(['author','publisher'])->paginate(10);

        return view('users/user_profile',['user' => $user, 'books'=>$books, 'user_books' => $user_books]);
    }

    public function viewBook($user_id, $book_id)
    {
        $book = Book::where('id',$book_id)->with(['author','publisher'])->first();

        $transaction = Transaction::where('user_id',$user_id)->where('book_id',$book->id)->get();

        $book_already_bought = false;

        if(count($transaction))
            $book_already_bought = true;

        return view('users/buy_book',['user_id' => $user_id,'book' => $book, 'bought' => $book_already_bought]);
    }
}
