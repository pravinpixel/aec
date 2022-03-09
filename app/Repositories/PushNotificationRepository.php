<?php namespace App\Repositories;
use App\Interfaces\PushNotificationRepositoryInterface;

class PushNotificationRepository implements PushNotificationRepositoryInterface
{
	public function sendPushNotification($message_type, $chat_type){
		// return [$message_type, $chat_type];
        $SERVER_API_KEY = 'AAAA0L4qpng:APA91bG9QBnGO2Sx5iws0i32Qo5SLPiN3HwYU2vMYWJBinF5JGfm2s_434VuaMno-KRw2ZSSi12XdzMmcLlcXpQL51Ea1B2lkQymMSAWaELSU-laofEhcT6k64jUq0mi2b3rvgapPk7k';
        $firebaseToken  = '';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
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

        return $response;
	}
}