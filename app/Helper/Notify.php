<?php
namespace App\Helper;
use App\Notifications\InboxNotification;
use Illuminate\Support\Facades\Notification;

class Notify {
    public static function send($data)
    {
        return Notification::send(null,new InboxNotification(
            $data['title'],
            $data['body'],
            $data['token']
        ));
    }
}