<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getTransactions()
    {
        return Transaction::paginate(10);
    }

    public function index()
    {
        return view('transactions/transaction_index',['transactions' => $this->getTransactions()]);
    }

    public function store(Request $request)
    {
        $book_id = $request->book_id;
        $user_id = $request->user_id;

        $transaction = new Transaction([
           'book_id' => $book_id,
           'user_id' => $user_id,
            'transaction_time' => now()
        ]);

        $transaction->save();

        $user = User::where('id',$user_id)->first();

        return redirect('/user/'.$user->username);
    }
}
