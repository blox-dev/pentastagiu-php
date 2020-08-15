<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransactionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $book_id, $user_id, $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($book_id, $user_id, $action)
    {
        $this->book_id=$book_id;
        $this->user_id=$user_id;
        $this->action=$action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
