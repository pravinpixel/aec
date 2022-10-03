<?php

namespace App\Http\Controllers;

use App\Helper\Notify;
use App\Notifications\InboxNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Kutia\Larafirebase\Facades\Larafirebase;

class InboxController extends Controller
{
    public function inbox()
    {
        return view('inbox');
    }
    public function get_token()
    {
        $fcmTokens = 'dAODiLYXR2b7hZDzv9Bnzf:APA91bEFWhW12pw0ydKPx_sIdknJWbfnromYiGpJuB_penztRpGv9k674-k28-NfZKMBWw9a046cwO4Fg5QcsqAWWwpjtDLx1sa70tlp5eS9we2D-X2wXHBzuGXe43vyKnvUsese2ELp';
       
        Notify::send([
            "title" => "Testing Title",
            "body"  => "Testing Body",
            "token" => $fcmTokens
        ]);
        
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