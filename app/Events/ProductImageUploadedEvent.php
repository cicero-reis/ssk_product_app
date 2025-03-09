<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductImageUploadedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $productId;
    public string $originalName;
    public string $storedFileName;

    /**
     * Create a new event instance.
     */
    public function __construct(int $productId, string $originalName, string $storedFileName)
    {
        $this->productId = $productId;
        $this->originalName = $originalName;
        $this->storedFileName = $storedFileName;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
