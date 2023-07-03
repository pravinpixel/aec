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
        if ($data['module_name'] == 'ENQUIRY') {
            $module = Enquiry::with('customer')->find($data['module_id']);
        }
        if ($data['module_name'] == 'PROJECT' || $data['module_name'] == 'LIVE_PROJECT') {
            $module = Enquiry::with('customer')->where('project_id', $data['module_id'])->first();
        }
        $sender      = AecAuthUser();
        $sender_role = strtoupper($sender->Role->slug);

        if ($sender_role == 'AEC_CUSTOMER') {
            $adminTokens   = Employees::whereNotNull('token')->pluck('token')->toArray();
            $receiver_role = "ADMIN";
            $receiver_id   = 1;
            $token         = $adminTokens;
        }
        if ($sender_role == 'ADMIN') {
            $receiver_role = "AEC_CUSTOMER";
            $receiver_id   = $module->customer->AecUsers->job_role;
            $token         = $module->customer->token;
        }
        Inbox::where([
            'receiver_role'   => strtoupper(AecAuthUser()->Role->slug),
            'receiver_id'     => AecAuthUser()->Role->id,
            'module_name'     => strtoupper($data['module_name']),
            'module_id'       => $data['module_id'],
            'receiver_status' => 0
        ])->update([ 'receiver_status' => 1]);
        Inbox::create([
            "message"       => $data['message'],
            'sender_role'   => strtoupper($sender->Role->slug),
            'sender_id'     => $sender->Role->id,
            'receiver_role' => strtoupper($receiver_role),
            'receiver_id'   => $receiver_id,
            'module_name'   => strtoupper($data['module_name']),
            'module_id'     => $data['module_id'],
            'menu_name'     => $data['menu_name'],
            'send_date'     => now()->format('d-m-Y H:m')
        ]);

        Notification::send(null, new InboxNotification(
            $data['message'],
            ucfirst($sender->full_name) . " - " . strtolower($sender_role),
            $token
        ));

        return static::getMessages($data);
    }

    public static function getMessages($data)
    {
        $Role = strtoupper(AecAuthUser()->Role->slug);
        if ($Role == 'AEC_CUSTOMER') {
            $module      = Enquiry::with('customer')->find($data['module_id']);
            $customer_id = $module->customer->AecUsers->job_role;
            $messages = Inbox::whereRaw('(
                    module_name   = "' . $data['module_name'] . '" and
                    module_id     = "' . $data['module_id'] . '" and
                    menu_name     = "' . $data['menu_name'] . '" and
                    sender_role   = "AEC_CUSTOMER" and
                    sender_id     = ' . $customer_id . ' and
                    receiver_role = "ADMIN"
                )or( 
                    module_name   = "' . $data['module_name'] . '" and
                    module_id     = "' . $data['module_id'] . '" and
                    menu_name     = "' . $data['menu_name'] . '" and
                    sender_role   = "ADMIN" and
                    receiver_role = "AEC_CUSTOMER" and
                    receiver_id   = ' . $customer_id . '
            )')->oldest()->get();
        } else {
            $messages = Inbox::where([
                "module_name" => $data["module_name"],
                "module_id"   => $data["module_id"],
                "menu_name"   => $data["menu_name"],
            ])->oldest()->get();
        }
        $conversation = '';
        foreach ($messages->toArray() as $msg) {
            if (!is_null(Admin())) {
                if ($msg['sender_role'] == 'AEC_CUSTOMER') {
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
        $no_data = '<li class="bg-light rounded shadow-sm p-2">
                        <div class="text-center w-100">
                            <i class="mdi mdi-android-messages"></i>
                            <span class="f-16">There is No Chat History</span>
                        </div>
                    </li>';
        return $conversation != '' ? $conversation : $no_data;
    }
    public static function setUnreadMessages($data)
    {
        return Inbox::where('receiver_id', AuthUserData()->id)->where('receiver_role', AuthUser())->update([
            'receiver_status' => 1
        ]);
    }
    public static function getModuleMessagesCount($data, $arg)
    {
        $messages_count = Inbox::where([
            'receiver_role' => strtoupper(AecAuthUser()->Role->slug),
            'receiver_id'   => AecAuthUser()->Role->id,
            "module_name"   => $data["module_name"],
            "module_id"     => $data["module_id"],
            'receiver_status' => 0
        ])->when($arg['is_menu'], function ($q) use ($data) {
            $q->where('menu_name', $data['menu_name']);
        })->get();

        if ($arg['element'] && count($messages_count)) {
            return '<small class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . count($messages_count) . '</small>';
        }
        if ($arg['count']) {
            return count($messages_count);
        }
        if ($arg['array']) {
            return $messages_count;
        }
    }
    public static function getModuleMenuMessagesCount($data)
    {
        return Notify::getModuleMessagesCount($data, [
            "is_menu" => true,
            "count"   => true,
            "element" => false,
            "array"   => false
        ]);
        // $messages_count = false;
        // if ($data['user_type'] == 'ADMIN') {
        //     if ($data['module_name'] == 'ENQUIRY' || $data['module_name'] == 'PROJECT' ||  $data['module_name'] == 'LIVE_PROJECT') {

        //         if ($data['module_name'] == 'PROJECT' ||  $data['module_name'] == 'LIVE_PROJECT') {
        //             $Enquiry = Project::with('customer')->find($data['module_id'])->first();
        //         } else {
        //             $Enquiry = Enquiry::with('customer')->find($data['module_id']);
        //         }

        //         $messages_count = Inbox::where([
        //             "module_name" => $data["module_name"],
        //             "module_id"   => $data["module_id"],
        //             "menu_name"   => $data["menu_name"],
        //             "sender_role" => 'AEC_CUSTOMER',
        //             "sender_id"   => $Enquiry->customer->id,
        //             "read_status" => 0
        //         ])->count();
        //     }
        // } elseif ($data['user_type'] == 'AEC_CUSTOMER') {
        //     if ($data['module_name'] == 'ENQUIRY' || $data['module_name'] == 'PROJECT' ||  $data['module_name'] == 'LIVE_PROJECT') {
        //         $messages_count = Inbox::where([
        //             "module_name" => $data["module_name"],
        //             "module_id"   => $data["module_id"],
        //             "menu_name"   => $data["menu_name"],
        //             "sender_role" => 'ADMIN',
        //             "read_status" => 0
        //         ])->count();
        //     }
        // }
        // if ($messages_count) {
        //     return $messages_count;
        // }
    }
}
