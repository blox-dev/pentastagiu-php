<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Transaction;
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

    public function store(TransactionRequest $request)
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

        return redirect('/user/');
    }
    public function delete(TransactionRequest $request)
    {
        Transaction::where('user_id',$request->user_id)->where('book_id',$request->book_id)->delete();

        return redirect(action('UserController@show',$request->user_id));
    }
}
