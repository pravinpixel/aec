<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Config;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
 
    protected $customerRepo;

    public function __construct(CustomerEnquiryRepositoryInterface $customerEnquiryRepository)
    {
        $this->customerRepo = $customerEnquiryRepository;
    }

    public function index() 
    {
        return view('customers.pages.my-enquiries');
    }

    public function create() 
    {
        $customer = $this->customerRepo->getCustomerEnquiry(Customer()->id);
        return view('customers.pages.create-enquiries',compact('customer'));
    }

    public function show() 
    {
        return view('customers.pages.enquiry-single-view');
    }
}
