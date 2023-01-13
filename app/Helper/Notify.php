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

        if($data['module_name'] == 'enquiry' || $data['module_name'] == 'project') {
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
            )')->latest()->get();
        } 
        if(!is_null(Admin())) {
            $messages = Inbox::where([
                "module_name" => $data["module_name"],
                "module_id"   => $data["module_id"],
                "menu_name"   => $data["menu_name"],
            ])->latest()->get(); 
        }
  
        if($data['read_status'] ?? false) {
            foreach($messages as $row) {
                Inbox::find($row->id)->update(['read_status' => 1]);
            }
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
                        <small class="text-secondary">'.SetDateTimeFormat($msg['send_date']).'</small>
                    </div>
                </li>
            ';
        }
         
        return $conversation != '' ? $conversation : '
            <li class="bg-light rounded shadow-sm p-2">
                <div class="text-center w-100">
                    <i class="mdi mdi-android-messages"></i>
                    <span class="f-16">There is No Chat History</span>
                </div>
            </li>
        ';
    }

    public static function getModuleMessagesCount($data)
    {
        if($data['user_type'] == 'ADMIN') {
            if($data['module_name'] == 'Enquiry') {
                $messages_count = Inbox::where([
                    "module_name" => $data["module_name"],
                    "module_id"   => $data["module_id"],
                    "sender_role" => 'Customer',
                    "sender_id"   =>  getCustomerByEnquiryId($data["module_id"])->id,
                    "read_status" => 0
                ])->count();
            }
        } elseif($data['user_type'] == 'CUSTOMER') {

            if($data['module_name'] == 'Enquiry') {
                $messages_count = Inbox::where([
                    "module_name" => $data["module_name"],
                    "module_id"   => $data["module_id"],
                    "sender_role" => 'Admin',
                    "read_status" => 0
                ])->count();
            }
        }
        if($messages_count) {
            return '
                <small class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    '.$messages_count.'
                </small>
            ';
        }
    }
    public static function getModuleMenuMessagesCount($data)
    {
        $messages_count = false;
        if($data['user_type'] == 'ADMIN') {
            if($data['module_name'] == 'Enquiry' || $data['module_name'] == 'enquiry') {
                $messages_count = Inbox::where([
                    "module_name" => $data["module_name"],
                    "module_id"   => $data["module_id"],
                    "menu_name"   => $data["menu_name"],
                    "sender_role" => 'Customer',
                    "sender_id"   =>  getCustomerByEnquiryId($data["module_id"])->id,
                    "read_status" => 0
                ])->count();
            }
        } elseif($data['user_type'] == 'CUSTOMER') {
            if($data['module_name'] == 'Enquiry' || $data['module_name'] == 'enquiry') {
                $messages_count = Inbox::where([
                    "module_name" => $data["module_name"],
                    "module_id"   => $data["module_id"],
                    "menu_name"   => $data["menu_name"],
                    "sender_role" => 'Admin',
                    "read_status" => 0
                ])->count();
            }
        } 
        
        if($messages_count) {
            return $messages_count ;
        }
    }
}