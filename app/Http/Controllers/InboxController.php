<?php

namespace App\Http\Controllers;

use App\Notifications\InboxNotification;
use Illuminate\Http\Request;
use Notification;
use Kutia\Larafirebase\Facades\Larafirebase;

class InboxController extends Controller
{
    public function inbox()
    {
        return view('inbox');
    }
    public function get_token()
    {
        
        $title     = "";
        $message   = "Dummy Message";
        $fcmTokens = 'dAODiLYXR2b7hZDzv9Bnzf:APA91bEFWhW12pw0ydKPx_sIdknJWbfnromYiGpJuB_penztRpGv9k674-k28-NfZKMBWw9a046cwO4Fg5QcsqAWWwpjtDLx1sa70tlp5eS9we2D-X2wXHBzuGXe43vyKnvUsese2ELp';
        
        Larafirebase::withTitle($title)
            ->withBody('Test body')
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