<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PunishmentReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    private $roomId;

    /**
     * Create a new event instance.
     *
     * @param array $message
     * @return void
     */
    public function __construct(array $message, $roomId)
    {
        $this->message = $message;
        $this->roomId = $roomId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // 渡すチャンネルはプライベート
        // roomIdでチェックとか必要かなぁ
        return new PrivateChannel('punishment.'.$this->roomId);
    }

    /**
     * message['success']がtrueのときのみブロードキャスト
     * @return mixed
     */
    public function broadcastWhen()
    {
        return $this->message['success'];
    }
}
