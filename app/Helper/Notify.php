<?php
namespace App\Helper;

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
                $receiver_role = "Admin" ;
                $receiver_id   = 1;
            }
            if($sender_role == 'Admin') {
                $receiver_role = "CUSTOMER" ;
                $receiver_id   = $Enquiry->customer->id;
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
            $data['token']
        ));

        return Inbox::where([
            'sender_role'   => $sender_role,
            'sender_id'     => $sender_id,
            'module_name'   => $data['module_name'],
            'module_id'     => $data['module_id'],
            'menu_name'     => $data['menu_name'],
        ])->get();
    }

    public static function getMessages($data)
    {
        if(!is_null(Admin())) {
            $sender_role = userRole()->name;
            $sender_id   = Admin()->id;
        }

        if(!is_null(Customer())) {
            $sender_role = "Customer";
            $sender_id   = Customer()->id;
        }

        return Inbox::where([
            'module_name'   => $data['module_name'],
            'module_id'     => $data['module_id'],
            'menu_name'     => $data['menu_name'],
        ])->get();
    }
}