<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\View\Components\enquiryQuickView;

class HelperController extends Controller
{
     
    public function enquiry_quick_view($id)
    {
        $enquiry_details    = new enquiryQuickView($id, $table = 1 ,$chat = 1);
        return $enquiry_details->render();
    }
}