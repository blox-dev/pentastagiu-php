<?php

namespace App\Http\Controllers;

use App\Events\TransactionEvent;
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
        event(new TransactionEvent($request->book_id, $request->user_id,'create'));

        return redirect('/user/');
    }
    public function delete(TransactionRequest $request)
    {
        event(new TransactionEvent($request->book_id, $request->user_id,'delete'));

        return redirect(action('UserController@show',$request->user_id));
    }
}
