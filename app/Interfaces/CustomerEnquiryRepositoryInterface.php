<?php

namespace App\Interfaces;
interface CustomerEnquiryRepositoryInterface
{
    public function create(array  $data);

    public function getCustomerEnquiry(int $id);

}