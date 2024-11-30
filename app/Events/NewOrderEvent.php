<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewOrderEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    public $user_name;
    public $total;
    public $message;
    public $timestamp;

    public function __construct($user_name, $total)
    {
        $this->user_name = $user_name;
        $this->total = $total;
        $this->message = "طلب جديد من " . $user_name . ": إجمالي " . $total;
        $this->timestamp = now()->toDateTimeString();
    }

    public function broadcastOn()
    {
        return new Channel('admin-notifications');
    }
}
