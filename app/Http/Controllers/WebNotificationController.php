<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
class WebNotificationController extends Controller
{
    public function index()
    {
        return view('push');
    }
    public function storeToken(Request $request)
    {
        dd($request->all());
        auth()->user()->update(['device_key'=>$request->token]);
        return response()->json(['Token successfully stored.']);
    }
  
    public function sendWebNotification(Request $request)
    {
        // dd($request->all());
        // $token = 'fibD134QuIS8cIWuII_qXP:APA91bERB-oYUiX0Fhla6altC2iyb4M1MTSIyZcQmgw1RqaKXNKcswsyRnr7v4GMI90QYKszq88Bu1CbtxV_T9wxk-iYXVCgApvh3Ot-VGlbdUUKgHyxGu14M15cI8LVf8JQdZifqJfV';
        $token = 'f3nGV1rnwOQ:APA91bGXF5PHUFDrM7oYAzexv9WPgH97b5KqyTf_GO2w0rmqbTrP0NAYLwc3MuA6PzwFjIbo8cYq6mjKZ43mvmkvsf6jbpp7crgO63mYIv26aitIz2w2hv9HY_kvAZg7FkEoq6whNpp4';
    //     // $firebaseToken = 'dqkUj-YBIIjPvFq3aw5EVO:APA91bHOBPFY17zQWNTOpspq5hyrC164BjF7bS6Ia9N1RmudX0E16-YB8vi_ODS4K2OAYb4FuINFTEyjT0OQgjIOVqhCOxqEW_Q9owesfuiqeEPe6DMX33XN_JyP8fzmA0ZfCTDaredS';

          
        $from = 'AAAA1bB9WaY:APA91bEJwABfscbQBH9z28zaCMZiPUZ1LajniVng_usHeTL2UBsB15h-XZGkwyKJnlTsZrlS7C1UlUcbJ2swMduO4mZJsgxqg26tCVRugnRr2PBu0u97M3J0wckDLv4Tw5Ovb36UQvZG';
  
  
    //     $url = 'https://fcm.googleapis.com/fcm/send'; 
  
    //     $data = [
    //         "registration_ids" => [$firebaseToken],
    //         "notification" => [
    //             "title" => $request->title,
    //             "body" => $request->body
    //         ]
    //     ];
    //     $encodedData = json_encode($data);
    
    //     $headers = [
    //         'Authorization:key=' . $serverKey,
    //         'Content-Type: application/json',
    //     ];
    
    //     $ch = curl_init();
      
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

    //     // Disabling SSL Certificate support temporarly
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

    //     // Execute post
    //     $result = curl_exec($ch);

    //     if ($result === FALSE) {
    //         die('Curl failed: ' . curl_error($ch));
    //     }     

    //     // Close connection
    //     curl_close($ch);
        
    //     // FCM response
    //    return $result;
    // $token = "edL4ukAZ4vY:APA91bFgz4DFVeP29MqVayuEUvs-7Qix8buB1vI10mthr2sBahe8t7tFxfJ5ogA6FgNw3Wfyo_HyORDzlpKURPpc4m942LdscyOWloX_2Kn2CR1nwEpMxPLI5kViRIT16t_K1sbPbdZQ";  
        // $from = "AIzaSyAvtcKESXzgF06fLcRo61Y8g1VQgSzLv_k";
        $msg = array
              (
                'body'  => "Testing Testing",
                'title' => "Hi, From Prabhu Kannan",
                'receiver' => 'erw',
                'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
    
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        // dd($result);
        curl_close($ch);
        return redirect()->back();
    }
}