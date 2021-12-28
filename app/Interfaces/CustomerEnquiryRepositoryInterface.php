<?php

namespace App\Interfaces;

use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\Service;

interface CustomerEnquiryRepositoryInterface
{
    public function create(array  $data);

    public function getCustomer(int $id);

    public function createCustomerEnquiryProjectInfo($enquiry_number, Customer $customer, array $data);

    public function createCustomerEnquiryServices(Enquiry $enquiry, $services);

    public function getEnquiry($enquiry_id);

    public function getEnquiryByEnquiryNo($enquiry_id);

    public function updateEnquiry(Enquiry $enquiry , $data);

}