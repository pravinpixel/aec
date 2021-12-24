<?php

namespace App\Repositories;

use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Customer;

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
}