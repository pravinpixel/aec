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
        return $this->customer::with('latestEnquiry')->find($id);
    }

    public function createCustomerEnquiryProjectInfo(Customer $customer, array $data)
    {
        return $customer->latestEnquiry()->update($data);
    }

    public function createCustomerEnquiryServices($enquiry_id,  $services)
    {
        $enquiry = $this->enquiry->find($enquiry_id);
        if($enquiry) {
            $enquiry->services()
                    ->detach();
        }
        return $enquiry->services()->attach($services);
    }
}