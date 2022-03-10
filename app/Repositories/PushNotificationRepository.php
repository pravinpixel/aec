<?php namespace App\Repositories;
use App\Interfaces\PushNotificationRepositoryInterface;

class PushNotificationRepository implements PushNotificationRepositoryInterface
{
	public function sendPushNotification($message_type, $chat_type, $firebaseToken){
		// return [$message_type, $chat_type];
        // Customer()
        
        
        $SERVER_API_KEY = 'AAAA1bB9WaY:APA91bHm0LR0QWWw9DJ1sAxr0WLusy3rpLsr-VuS1NAlM2ikJal_RE0ZKUlBOcGvvHP-xjk392HmxM2TmnRZ99mm1SQMcAxJI5mVcmA8sIu0pfs8yWL0vxPrG9SjmVvPVoRxlcr9FPHT';
        $firebaseToken_old  = '';
         
        $data = [
            "registration_ids" => ['ewwPtNSCa2SNdh2GuyY504:APA91bET1Vd94mbQtFaWxB_jLP1ZM4R0kn8U6RtWItOP71yJu1-ytxxOxyyame98EpF6jRHAu9TV1E2YcpPwgNykNDLe8E7-G-XRqrSQ_yrz9vA6KfXLuDGaHUCFUe4xDmXJaiIfdEq-'],
            "notification" => [
                "title" => "Testing Title",
                "body" => "Testing Body",
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
	}
}