<?php

namespace App\Interfaces;

interface PushNotificationRepositoryInterface {
    public function  sendPushNotification($firebaseToken,$title,$body);
}