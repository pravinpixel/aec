<?php

namespace App\Http\Controllers;
use App\Helper\Notify;
use App\Models\Admin\Employees;
use App\Models\Customer;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function inbox()
    {
        return view('inbox');
    }
    public function get_token()
    {
        $fcmTokens = 'dAODiLYXR2b7hZDzv9Bnzf:APA91bEFWhW12pw0ydKPx_sIdknJWbfnromYiGpJuB_penztRpGv9k674-k28-NfZKMBWw9a046cwO4Fg5QcsqAWWwpjtDLx1sa70tlp5eS9we2D-X2wXHBzuGXe43vyKnvUsese2ELp';
       
        Notify::send([
            "title"   => "Testing Title",
            "message" => "Testing Body",
            "token"   => $fcmTokens
        ]);
        
        return view('inbox');
    }

    public function store(Request $request)
    {
        if(!is_null(Admin())) {
          $storeToken =  Employees::find(Admin()->id)->update(["token" => $request->token ]);
        } elseif(!is_null(Customer())) {
          $storeToken =  Customer::find(Admin()->id)->update(["token" => $request->token ]);
        }
        if($storeToken) {
            return response()->json([
                "message" => "Success"
            ]);
        }
    }

    public function send_message(Request $request)
    {
        $conversations = Notify::send([
            "message"         => $request->message,
            'module_name'   => $request->module_name,
            'module_id'     => $request->module_id,
            'menu_name'     => $request->menu_name,
            "token"         => "dAODiLYXR2b7hZDzv9Bnzf:APA91bEFWhW12pw0ydKPx_sIdknJWbfnromYiGpJuB_penztRpGv9k674-k28-NfZKMBWw9a046cwO4Fg5QcsqAWWwpjtDLx1sa70tlp5eS9we2D-X2wXHBzuGXe43vyKnvUsese2ELp",
        ]);

        return response()->json([
            "conversations" => $conversations,
            "Message"       => "Success"
        ],200);
    } 
}