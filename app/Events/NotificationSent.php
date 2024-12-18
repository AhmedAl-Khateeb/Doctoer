<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    
    public $unreadCount;

    public function __construct($unreadCount)
    {
        $this->unreadCount = $unreadCount;
    }
    public function broadcastOn()
    {
        return new PrivateChannel('notifications');
    }

}
