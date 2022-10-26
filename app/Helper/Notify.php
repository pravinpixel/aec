<?php
namespace App\Helper;

use App\Models\Admin\Employees;
use App\Models\Enquiry;
use App\Models\Inbox;
use App\Notifications\InboxNotification;
use Illuminate\Support\Facades\Notification;

class Notify {
    public static function send($data)
    {
        if(!is_null(Admin())) {
            $sender_role = userRole()->name;
            $sender_id   = Admin()->id;
            $sender_name = Admin()->display_name;
        }

        if(!is_null(Customer())) {
            $sender_role = "Customer";
            $sender_id   = Customer()->id;
            $sender_name = Customer()->full_name;
        }

        if($data['module_name'] == 'enquiry') {
            $Enquiry = Enquiry::with('customer')->find($data['module_id']); 
            if($sender_role == 'Customer') {
                $adminTokens   = Employees::whereNotNull('token')->pluck('token')->toArray();
                $receiver_role = "Admin" ;
                $receiver_id   = 1;
                $token         = $adminTokens;
            }
            if($sender_role == 'Admin') {
                $receiver_role = "CUSTOMER" ;
                $receiver_id   = $Enquiry->customer->id;
                $token         = $Enquiry->customer->token;
            }
        }

        Inbox::create([
            "message"       => $data['message'],
            'sender_role'   =>  $sender_role,
            'sender_id'     =>  $sender_id,
            'receiver_role' =>  $receiver_role,
            'receiver_id'   =>  $receiver_id,
            'module_name'   =>  $data['module_name'],
            'module_id'     =>  $data['module_id'],
            'menu_name'     =>  $data['menu_name'],
            'send_date'     =>  now()->format('d-m-Y H:m')
        ]);
        
        Notification::send(null,new InboxNotification(
            $data['message'],
            ucfirst($sender_name)." - ".strtolower($sender_role),
            $token
        ));
     
        return static::getMessages($data); 
    }

    public static function getMessages($data)
    {
        if(!is_null(Customer())) {
            $messages = Inbox::whereRaw('(
                    module_name   = "'.$data['module_name'].'" and
                    module_id     = "'.$data['module_id'].'" and
                    menu_name     = "'.$data['menu_name'].'" and
                    sender_role   = "Customer" and
                    sender_id     = '.Customer()->id.' and
                    receiver_role = "Admin"
                )or( 
                    module_name   = "'.$data['module_name'].'" and
                    module_id     = "'.$data['module_id'].'" and
                    menu_name     = "'.$data['menu_name'].'" and
                    sender_role   = "Admin" and
                    receiver_role = "Customer" and
                    receiver_id   = '.Customer()->id.'
            )')->latest()->take(10)->get();
        } 
        if(!is_null(Admin())) {
            $messages = Inbox::where([
                "module_name" => $data["module_name"],
                "module_id"   => $data["module_id"],
                "menu_name"   => $data["menu_name"],
            ])->latest()->take(10)->get(); 
        }
 
        $conversation = '';     

        foreach(array_reverse($messages->toArray()) as $msg ) {

            if(!is_null(Admin())) {
                if($msg['sender_role'] == 'Customer') {
                    $messageClass = "message_left";
                } else {
                    $messageClass = "message_right";
                }
            }

            if(!is_null(Customer())) {
                if($msg['sender_role'] == 'Admin') {
                    $messageClass = "message_left";
                } else {
                    $messageClass = "message_right";
                }
            }
             
            $conversation .= '
                <li class="'.$messageClass.'" >
                    <div class="message-container">
                        <div class="text-message">'.$msg['message'].'</div>
                        <small class="text-secondary">'.$msg['send_date'].'</small>
                    </div>
                </li>
            ';
        }
        return $conversation;
    }
}