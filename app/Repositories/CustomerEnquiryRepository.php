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

    public function getCustomer($id){
        return $this->customer->find($id);
    }

    public function createCustomerEnquiryProjectInfo($enquiry_number, Customer $customer, array $data)
    {
        return $customer->enquiry()->updateOrCreate(['enquiry_number' => $enquiry_number], $data);
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

    public function updateEnquiry($id, $data)
    {
        return $this->enquiry->find($id)->update($data);
    }

    public function createEnquiryDocuments($enquiry,  $documents, $additionalData)
    {
        return $enquiry->documentTypes()->attach($documents, $additionalData);
    }

    public function getPlanViewList($id) 
    {
        $enquiry = $this->enquiry->with('documentTypes', function($q) {
                        $q->where('id', 1);
                    })->find($id);
        return $enquiry->documentTypes ?? [];
    }

    public function getFacaeViewList($id) 
    {
        $enquiry = $this->enquiry->with('documentTypes', function($q) {
                        $q->where('id', 2);
                    })->find($id);
        return $enquiry->documentTypes ?? [];
    }

    public function getIFCViewList($id) 
    {
        $enquiry = $this->enquiry->with('documentTypes', function($q) {
                        $q->where('id', 3);
                    })->find($id);
        return $enquiry->documentTypes ?? [];
    }

    public function getViewList($id, $documentTypeId)
    {
        $enquiry = $this->enquiry->find($id);
        $result = $enquiry->documentTypes()
                    ->wherePivot('document_type_id', $documentTypeId)
                    ->get();
        return $result ?? [];
    }
}