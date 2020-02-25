<?php

namespace App\Listeners;

use App\Events\RecipeEvent;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class RecipeEventListener
{
    public function __construct()
    {
    }

    public function handle(RecipeEvent $event)
    {
        $recipe = $event->recipe;
        $users = User::where('notification_id', '!=', null);
        $identities = $users->pluck('notification_id')->toArray();
        $client = new Client(getenv('TWILIO_API_KEY'), getenv('TWILIO_API_SECRET'),
            getenv('TWILIO_ACCOUNT_SID'));
        try {
            $n = $client->notify->v1->services(getenv('TWILIO_NOTIFY_SERVICE_SID'))
                ->notifications
                ->create([
                    'title' => "New recipe alert",
                    'body' => $recipe->title,
                    'identity' => $identities
                ]);
            Log::info($n->sid);
        } catch (TwilioException $e) {
            Log::error($e);
        }
    }
}
