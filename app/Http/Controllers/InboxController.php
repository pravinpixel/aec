<?php

namespace App\Http\Controllers;

use App\Notifications\InboxNotification;
use Illuminate\Http\Request;
use Notification;
use Kutia\Larafirebase\Facades\Larafirebase;

class InboxController extends Controller
{
    public function index()
    {
        return view('inbox');
    }
    public function get_token()
    {
        
        $title     = "test";
        $message   = "Dummy Message";
        $fcmTokens = session()->get('device_token');
        
        Larafirebase::withTitle( $title)
            ->withBody('Test body'.$message)
            ->withImage('https://firebase.google.com/images/social.png')
            ->withIcon('https://seeklogo.com/images/F/firebase-logo-402F407EE0-seeklogo.com.png')
            ->withSound('default')
            ->withClickAction('https://www.google.com')
            ->withPriority('high')
            ->withAdditionalData([
                'color' => '#252525',
                'badge' => 0,
            ])
            ->sendNotification($fcmTokens);

        return view('inbox');
    }

    public function store(Request $request)
    {
        session()->put('device_token', $request->token);
        return response()->json([
            "message" => "Success"
        ]);
    }
}