<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\View\Components\enquiryQuickView;

class HelperController extends Controller
{
     
    public function enquiry_quick_view($id, $type)
    {
        if($type == 'modal') {
            $enquiry =  new enquiryQuickView($id, $table = 1 ,$chat = 1);
            return $enquiry->render();
        } else {
            $enquiry =  new enquiryQuickView($id, $table = 0 ,$chat = 0);
            return $enquiry->render();
        }
    }
}