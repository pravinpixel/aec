<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index() 
    {
        return view('customers.pages.my-enquiries');
    }

    public function create() 
    {
        return view('customers.pages.create-enquiries');
    }

    public function show() 
    {
        return view('customers.pages.enquiry-single-view');
    }
}
