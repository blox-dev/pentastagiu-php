<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransactionNotificationListener
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
            case 'create': $this->create(); break;
            case 'delete': $this->delete(); break;
            default: dd('Unknown action.');
        }
    }
    private function create(){
        session()->put('success','You have borrowed the book successfully.');
    }
    private function delete(){
        session()->put('success','Book returned successfully.');
    }
}
