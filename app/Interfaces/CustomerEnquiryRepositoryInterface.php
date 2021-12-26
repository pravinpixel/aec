<?php

namespace App\Interfaces;

use App\Models\Customer;
use App\Models\Service;

interface CustomerEnquiryRepositoryInterface
{
    public function create(array  $data);

    public function getCustomerEnquiry(int $id);

    public function createCustomerEnquiryProjectInfo(Customer $customer, array $data);

    public function createCustomerEnquiryServices(Customer $customer,Service $service);

}