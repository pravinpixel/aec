<?php

namespace App\Helper;

use App\Models\Admin\Employees;
use App\Models\Enquiry;
use App\Models\Inbox;
use App\Models\Project;
use App\Notifications\InboxNotification;
use Illuminate\Support\Facades\Notification;

class Notify
{
    public static function send($data)
    {
        if (!is_null(Admin())) {
            $sender_role = strtoupper(userRole()->name);
            $sender_id   = Admin()->id;
            $sender_name = Admin()->full_name;
        }

        if (!is_null(Customer())) {
            $sender_role = "CUSTOMER";
            $sender_id   = Customer()->id;
            $sender_name = Customer()->full_name;
        }

        if ($data['module_name'] == 'ENQUIRY' || $data['module_name'] == 'PROJECT' || $data['module_name']  == 'LIVE_PROJECT') {
            if ($data['module_name'] == 'PROJECT' || $data['module_name'] == 'LIVE_PROJECT') {
                $Enquiry = Enquiry::with('customer')->where('project_id', $data['module_id'])->first();
            } else {
                $Enquiry = Enquiry::with('customer')->find($data['module_id']);
            }
            
            if ($sender_role == 'CUSTOMER') {
                $adminTokens   = Employees::whereNotNull('token')->pluck('token')->toArray();
                $receiver_role = "ADMIN";
                $receiver_id   = 1;
                $token         = $adminTokens;
            }
            if ($sender_role == 'ADMIN') {
                $receiver_role = "CUSTOMER";
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
            'module_name'   =>  strtoupper($data['module_name']),
            'module_id'     =>  $data['module_id'],
            'menu_name'     =>  $data['menu_name'],
            'send_date'     =>  now()->format('d-m-Y H:m')
        ]);

        Notification::send(null, new InboxNotification(
            $data['message'],
            ucfirst($sender_name) . " - " . strtolower($sender_role),
            $token
        ));

        return static::getMessages($data);
    }

    public static function getMessages($data)
    {
        if (!is_null(Customer())) {
            $messages = Inbox::whereRaw('(
                    module_name   = "' . $data['module_name'] . '" and
                    module_id     = "' . $data['module_id'] . '" and
                    menu_name     = "' . $data['menu_name'] . '" and
                    sender_role   = "CUSTOMER" and
                    sender_id     = ' . Customer()->id . ' and
                    receiver_role = "ADMIN"
                )or( 
                    module_name   = "' . $data['module_name'] . '" and
                    module_id     = "' . $data['module_id'] . '" and
                    menu_name     = "' . $data['menu_name'] . '" and
                    sender_role   = "ADMIN" and
                    receiver_role = "CUSTOMER" and
                    receiver_id   = ' . Customer()->id . '
            )')->latest()->get();
        }
        if (!is_null(Admin())) {
            $messages = Inbox::where([
                "module_name" => $data["module_name"],
                "module_id"   => $data["module_id"],
                "menu_name"   => $data["menu_name"],
            ])->latest()->get();
        }
        $conversation = '';
        foreach (array_reverse($messages->toArray()) as $msg) {

            if (!is_null(Admin())) {
                if ($msg['sender_role'] == 'CUSTOMER') {
                    $messageClass = "message_left";
                } else {
                    $messageClass = "message_right";
                }
            }

            if (!is_null(Customer())) {
                if ($msg['sender_role'] == 'ADMIN') {
                    $messageClass = "message_left";
                } else {
                    $messageClass = "message_right";
                }
            }

            $conversation .= '
                <li class="' . $messageClass . '" >
                    <div class="message-container">
                        <div class="text-message">' . $msg['message'] . '</div>
                        <small class="text-secondary">' . SetDateTimeFormat($msg['send_date']) . '</small>
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
    public static function setUnreadMessages($data)
    {
        return Inbox::where('receiver_id',AuthUserData()->id)->where('receiver_role', AuthUser())->update([
            "read_status" => "1"
        ]);
    }
    public static function getModuleMessagesCount($data)
    {
        $messages_count = false;
        if ($data['user_type'] == 'ADMIN') {
            if ($data['module_name'] == 'ENQUIRY'  || $data['module_name'] == 'PROJECT' ||  $data['module_name'] == 'LIVE_PROJECT') {
                $messages_count = Inbox::where([
                    "module_name" => $data["module_name"],
                    "module_id"   => $data["module_id"],
                    "sender_role" => 'CUSTOMER',
                    "sender_id"   => $data['module_name'] == 'ENQUIRY' ? getCustomerByEnquiryId($data["module_id"])->id : getCustomerByProjectId($data["module_id"])->id,
                    "read_status" => 0
                ])->count();
            }
        } elseif ($data['user_type'] == 'CUSTOMER') {
            if ($data['module_name'] == 'ENQUIRY' || $data['module_name'] == 'PROJECT' ||  $data['module_name'] == 'LIVE_PROJECT') {
                $messages_count = Inbox::where([
                    "module_name" => $data["module_name"],
                    "module_id"   => $data["module_id"],
                    "sender_role" => 'ADMIN',
                    "read_status" => 0
                ])->count();
            }
        }
        if ($messages_count) {
            return '
                <small class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    ' . $messages_count . '
                </small>
            ';
        }
    }
    public static function getModuleMenuMessagesCount($data)
    {
        $messages_count = false;
        if ($data['user_type'] == 'ADMIN') {
            if ($data['module_name'] == 'ENQUIRY' || $data['module_name'] == 'PROJECT' ||  $data['module_name'] == 'LIVE_PROJECT') {

                if ($data['module_name'] == 'PROJECT' ||  $data['module_name'] == 'LIVE_PROJECT') {
                    $Enquiry = Project::with('Customer')->find($data['module_id'])->first();
                } else {
                    $Enquiry = Enquiry::with('customer')->find($data['module_id']);
                }
               
                $messages_count = Inbox::where([
                    "module_name" => $data["module_name"],
                    "module_id"   => $data["module_id"],
                    "menu_name"   => $data["menu_name"],
                    "sender_role" => 'CUSTOMER',
                    "sender_id"   => $Enquiry->customer->id,
                    "read_status" => 0
                ])->count();
            }
        } elseif ($data['user_type'] == 'CUSTOMER') {
            if ($data['module_name'] == 'ENQUIRY' || $data['module_name'] == 'PROJECT' ||  $data['module_name'] == 'LIVE_PROJECT') {
                $messages_count = Inbox::where([
                    "module_name" => $data["module_name"],
                    "module_id"   => $data["module_id"],
                    "menu_name"   => $data["menu_name"],
                    "sender_role" => 'ADMIN',
                    "read_status" => 0
                ])->count();
            }
        }
        if ($messages_count) {
            return $messages_count;
        }
    }
}
