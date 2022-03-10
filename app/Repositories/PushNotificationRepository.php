<?php namespace App\Repositories;
use App\Interfaces\PushNotificationRepositoryInterface;

class PushNotificationRepository implements PushNotificationRepositoryInterface
{
	public function sendPushNotification($message_type, $chat_type, $firebaseToken){
		// return [$message_type, $chat_type];
        // Customer()
        

        $SERVER_API_KEY = 'AAAA0L4qpng:APA91bEGZ-XkiUV6dSAiVqTtte_27sw6suBbIs0l81qaHqp3KhATS2oyEeK-CcAAhQBKAdiFaEsXEIrypFwHfpFlONjZ1MLeKtSGqhWDVOGGE6vsDARyc_tMDEte5z_DYWoxO1zqFXac';
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