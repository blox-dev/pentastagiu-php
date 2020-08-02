<?php

namespace App\Http\Controllers;

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

        return redirect('/user/'.$username);
    }
    public function show($username)
    {
        $user = User::where('username',$username)->first();
        $transactions = Transaction::where('user_id',$user->id)->with(['user','book.author','book.publisher'])->get();

//        $books = $transactions->map(function ($transaction){
//           return $transaction->only(['book']);
//        });

        return view('users/user_profile',['username' => $username, 'transactions' => $transactions]);
    }
}
