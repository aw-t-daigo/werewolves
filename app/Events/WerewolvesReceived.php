<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WerewolvesReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $playerId;
    private $roomId;

    /**
     * Create a new event instance.
     *
     * @param $message
     * @param $playerId
     * @param $roomId
     */
    public function __construct($message, $playerId, $roomId)
    {
        $this->message = $message;
        $this->playerId = $playerId;
        $this->roomId = $roomId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('werewolves.' . $this->roomId);
    }
}
