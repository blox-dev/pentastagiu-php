<?php

namespace App\Http\Controllers;

use App\Book;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        $name = $request->name;

        $user = User::where('name',$request->name)->get();

        if($user->isEmpty()) {
            $user = new User(['name' => $name,
                              'email' => $request->email,
                              'password' => $request->password ]);
            $user->save();
        }

        $user = User::where('name',$request->name)->first();

        return redirect('/user/'.$user->id);
    }
    public function show()
    {
        $books = Book::with(['author','publisher'])->paginate(10);

        if(Auth::check()){
            $user_books = Auth::user()->with(['book.author','book.publisher'])->first();
            return view('users/user_profile',[ 'books'=>$books, 'user_books' => $user_books]);
        }
        else return view('users/user_profile',[ 'books' => $books]);

    }

    public function viewBook($book_id)
    {
        $book = Book::where('id',$book_id)->with(['author','publisher'])->first();

        $book_already_bought = false;

        $transaction = Transaction::where('user_id',Auth::user()->id)->where('book_id',$book->id)->get();

        if(count($transaction))
            $book_already_bought = true;

        return view('users/buy_book',['book' => $book, 'bought' => $book_already_bought]);
    }
}
