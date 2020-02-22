<?php

namespace App\Events;

use App\Recipe;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RecipeEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
        Log::info("Recipe Created: ".$recipe);
    }

    public function broadcastOn()
    {
        return [];
    }
}
