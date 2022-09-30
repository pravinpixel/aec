<?php

namespace App\Http\Controllers;

use App\View\Components\enquiryQuickView;

class HelperController extends Controller
{
     
    public function enquiry_quick_view($id)
    {
        $com = new enquiryQuickView($id);
        return $com->render();
    }
}