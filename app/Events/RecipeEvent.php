<?php

namespace App\Events;

use App\Recipe;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

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
