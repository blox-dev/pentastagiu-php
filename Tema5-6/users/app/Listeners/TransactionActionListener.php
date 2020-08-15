<?php

namespace App\Listeners;

use App\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransactionActionListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        switch ($event->action){
            case 'create': $this->create($event); break;
            case 'delete': $this->delete($event); break;
            default: dd('Unknown action.');
        }
    }

    private function create($event){
        $transaction = new Transaction([
            'book_id' => $event->book_id,
            'user_id' => $event->user_id,
            'transaction_time' => now(),
            'return_time' => date("Y-m-d H:i:s", strtotime("+1 month"))
        ]);

        $transaction->timestamps = false;
        $transaction->save();
    }
    private function delete($event){
        Transaction::where('user_id',$event->user_id)->where('book_id',$event->book_id)->delete();
    }
}
