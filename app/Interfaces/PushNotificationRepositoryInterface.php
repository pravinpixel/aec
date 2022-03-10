<?php

namespace App\Interfaces;

interface PushNotificationRepositoryInterface {
    public function  sendPushNotification($message_type, $sender_id, $firebaseToken);
}