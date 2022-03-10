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
            "registration_ids" => [$firebaseToken[0]],
            "notification" => [
                "title" => "Testing Title",
                "body" => "Testing Body",
                "content_available" => true,
                "priority" => "high",
                "icon" => "https://cdn-icons-png.flaticon.com/512/725/725107.png",
                
            ],
            "webpush" => [
                "fcm_options"=> [
                    'link' => 'https://firebase.google.com',
                    'click_action' => 'https://firebase.google.com',
                ]
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