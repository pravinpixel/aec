<?php

namespace App\Repositories;

use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Customer;
use App\Models\Enquiry;
use App\Models\EnquiryService;
use App\Models\Service;

class CustomerEnquiryRepository implements CustomerEnquiryRepositoryInterface{
    protected $customer;
    protected $enquiryService;
    protected $enquiry;

    function __construct(Customer $customer,Enquiry $enquiry, Service $service)
    {
        $this->customer = $customer;
        $this->service = $service;
        $this->enquiry = $enquiry;
    }

    
    public function create(array  $data){
      
    }

    public function getCustomerEnquiry($id){
        return $this->customer->find($id);
    }

    public function createCustomerEnquiryProjectInfo($customerEnquiryNumber, Customer $customer, array $data)
    {
        return $customer->enquiry()->updateOrCreate(['enquiry_number' => $customerEnquiryNumber], $data);
    }

    public function createCustomerEnquiryServices($enquiry,  $services)
    {
        if($enquiry) {
            $enquiry->services()
                    ->detach();
        }
        return $enquiry->services()->attach($services);
    }

    public function getEnquiry($id) 
    {
        return $this->enquiry->with('customer')->find($id);
    }

    public function getEnquiryByEnquiryNo($no)
    {
        return $this->enquiry->where('enquiry_number', $no)->first();
    }

    public function updateEnquriry($enquiry, $customer, $data)
    {

    }
}