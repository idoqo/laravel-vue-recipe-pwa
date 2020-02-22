<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;
use Twilio\Rest\Client;

class NotificationsController extends Controller
{
    public function createBinding(Request $request) {
        $client = new Client(getenv('TWILIO_API_KEY'), getenv('TWILIO_API_SECRET'),
            getenv('TWILIO_ACCOUNT_SID'));
        $service = $client->notify->v1->services(getenv('TWILIO_NOTIFY_SERVICE_SID'));

        $request->validate([
            'token' => 'string|required'
        ]);
        $address = $request->get('token');

        // we are just picking the user with id = 1,
        // ideally, it should be the authenticated user's id e.g $userId = auth()->user()->id
        $user = User::find(1);
        $identity = sprintf("%05d", $user->id);
        Log::info($address);
        Log::info($identity);
        // attach the identity to this user's record
        $user->update(['notification_id' => $identity]);
        try {
            $binding = $service->bindings->create(
                $identity,
                // fcm for firebase messaging, view binding types at http://bind-docs
                'fcm',
                $address
            );
            Log::info($binding);
            return response()->json(['message' => 'binding created']);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['message' => 'could not create binding'], 500);
        }
    }
}
