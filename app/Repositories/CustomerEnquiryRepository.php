<?php

namespace App\Repositories;

use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Customer;
use App\Models\Service;

class CustomerEnquiryRepository implements CustomerEnquiryRepositoryInterface{
    protected $customer;

    function __construct(Customer $customer)
    {
        $this->customer = $customer;
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

    public function createCustomerEnquiryServices(Customer $customer, Service $data)
    {
        return $customer->enquiryServices()->updateOrCreate($data);
    }
}