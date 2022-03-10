<?php namespace App\Repositories;
use App\Interfaces\PushNotificationRepositoryInterface;

class PushNotificationRepository implements PushNotificationRepositoryInterface
{
	public function sendPushNotification($message_type, $chat_type, $firebaseToken){
		// return [$message_type, $chat_type];
        // Customer()
        

        $SERVER_API_KEY = 'AAAA1bB9WaY:APA91bHm0LR0QWWw9DJ1sAxr0WLusy3rpLsr-VuS1NAlM2ikJal_RE0ZKUlBOcGvvHP-xjk392HmxM2TmnRZ99mm1SQMcAxJI5mVcmA8sIu0pfs8yWL0vxPrG9SjmVvPVoRxlcr9FPHT';
        $firebaseToken_old  = 'f3nGV1rnwOQ:APA91bGXF5PHUFDrM7oYAzexv9WPgH97b5KqyTf_GO2w0rmqbTrP0NAYLwc3MuA6PzwFjIbo8cYq6mjKZ43mvmkvsf6jbpp7crgO63mYIv26aitIz2w2hv9HY_kvAZg7FkEoq6whNpp4';
         
        $data = [
            "registration_ids" => [$firebaseToken_old],
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