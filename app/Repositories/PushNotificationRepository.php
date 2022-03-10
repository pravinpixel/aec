<?php namespace App\Repositories;
use App\Interfaces\PushNotificationRepositoryInterface;

class PushNotificationRepository implements PushNotificationRepositoryInterface
{
	public function sendPushNotification($message_type, $chat_type, $firebaseToken){
		// return [$message_type, $chat_type];
        // Customer()
        

        $SERVER_API_KEY = 'AAAA0L4qpng:APA91bEGZ-XkiUV6dSAiVqTtte_27sw6suBbIs0l81qaHqp3KhATS2oyEeK-CcAAhQBKAdiFaEsXEIrypFwHfpFlONjZ1MLeKtSGqhWDVOGGE6vsDARyc_tMDEte5z_DYWoxO1zqFXac';
        $firebaseToken_old  = 'elCrAarDzYVJvVLYplXMGq:APA91bHZyaGiG_mP65R4IT-VTGPG88-ou2a0-iaCKQhrBEgqmUAfOK6if5nKAyIYeyspgx39NXIuQjZx5Lu9BYaYB2SmUaU_xPf2rTKN-OJNONdT_HekJGu_QyymE6kBR2D2FMV09Fx8';
         
        $data = [
            "registration_ids" => $firebaseToken[0],
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