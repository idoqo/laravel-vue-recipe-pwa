<?php

namespace App\Events;

use App\Recipe;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RecipeEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    public function broadcastOn()
    {
        return [];
    }
}
