<?php

namespace App\Listeners;

use App\Events\RecipeEvent;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class BroadcastNotification
{
    public function __construct()
    {
    }

    public function handle(RecipeEvent $event)
    {
        $recipe = $event->recipe;
        $users = User::where('notification_id', '!=', null);
        $identities = $users->pluck('notification_id')->toArray();
        array_push($identities, ['O26VfE8629jrvc7S', 'wn4Ko5IFmbyIoP2J', '2qzW5zw2sp3WI3sc']);
        $client = new Client(env('TWILIO_API_KEY'), env('TWILIO_API_SECRET'),
            env('TWILIO_ACCOUNT_SID'));
        $service = $client->notify->v1->services(env('TWILIO_NOTIFY_SERVICE_SID'));
        try {
            $notification = $service->notifications->create([
                'identity' => ["00001"],
                'body' => $recipe->title
            ]);
            Log::info($notification->sid);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
