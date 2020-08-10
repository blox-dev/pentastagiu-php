<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getTransactions()
    {
        return Transaction::with(['user','book'])->paginate(10);
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
            'transaction_time' => now(),
            'return_time' => date("Y-m-d H:i:s", strtotime("+1 month"))
        ]);

        $transaction->timestamps = false;
        $transaction->save();

        return redirect('/user/'.$user_id);
    }
    public function delete(Request $request)
    {
        Transaction::where('user_id',$request->user_id)->where('book_id',$request->book_id)->delete();

        return redirect(action('UserController@show',$request->user_id));
    }
}
