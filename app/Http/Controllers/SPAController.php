<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PHPUnit\Exception;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class SPAController extends Controller
{
    public function index() {
        return view('home');
    }

    public function sendNotification() {
        $client = new Client(getenv('TWILIO_API_KEY'), getenv('TWILIO_API_SECRET'),
            getenv('TWILIO_ACCOUNT_SID'));
        try {
            $n = $client->notify->v1->services(getenv('TWILIO_NOTIFY_SERVICE_SID'))
                ->notifications
                ->create([
                    'body' => "Hello world!",
                    'identity' => ['O26VfE8629jrvc7S', 'v5cMChLbKbkN6Y1U']
                ]);
            Log::info($n->sid);
        } catch (TwilioException $e) {
            Log::error($e);
        }
    }

    public function createBinding(Request $request) {
        $client = new Client(getenv('TWILIO_API_KEY'), getenv('TWILIO_API_SECRET'),
            getenv('TWILIO_ACCOUNT_SID'));
        $service = $client->notify->v1->services(getenv('TWILIO_NOTIFY_SERVICE_SID'));

        $request->validate([
            'token' => 'string|required'
        ]);
        $address = $request->get('token');
        $identity = Str::random();
        Log::info($address);
        Log::info($identity);
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
