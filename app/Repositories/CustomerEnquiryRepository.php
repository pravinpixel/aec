<?php

namespace App\Repositories;

use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Customer;
use App\Models\DocumentTypeEnquiry;
use App\Models\Enquiry;
use App\Models\EnquiryBuildingComponent;
use App\Models\EnquiryBuildingComponentDetail;
use App\Models\EnquiryBuildingComponentLayer;
use App\Models\EnquiryService;
use App\Models\Service;

class CustomerEnquiryRepository implements CustomerEnquiryRepositoryInterface{
    protected $customer;
    protected $enquiryService;
    protected $enquiry;
    protected $documentTypeEnquiry;

    function __construct(Customer $customer,Enquiry $enquiry, Service $service, DocumentTypeEnquiry $documentTypeEnquiry)
    {
        $this->customer = $customer;
        $this->service = $service;
        $this->enquiry = $enquiry;
        $this->documentTypeEnquiry = $documentTypeEnquiry;
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
        return $this->enquiry->with('customer')
                    ->where('customer_id', Customer()->id)
                    ->find($id);
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

    public function deleteDocumentEnquiry($id)
    {
        $document_type = $this->documentTypeEnquiry->find($id);
        if(!empty($document_type)) {
            return $document_type->update(['deleted_at' => now()]);
        }
        return false;
    }

    public function storeBuildingComponent($enquiry,$buildingComponents) 
    {   
        EnquiryBuildingComponent::where('enquiry_id', $enquiry->id)->delete();
        EnquiryBuildingComponentDetail::where('enquiry_id', $enquiry->id)->delete();
        EnquiryBuildingComponentLayer::where('enquiry_id', $enquiry->id)->delete();
        foreach($buildingComponents as $buildingComponent) {
            $enquiryBuildingComponent = new EnquiryBuildingComponent();
            $enquiryBuildingComponent->building_component_id = $buildingComponent->WallId;
            $enquiryBuildingComponent->enquiry_id = $enquiry->id;
            $enquiryBuildingComponent->save();
            if($enquiryBuildingComponent && !empty($buildingComponent->Details)) {
                foreach($buildingComponent->Details as $buildingComponentDetail) {
                    $enquiryBuildingComponentDetail = new EnquiryBuildingComponentDetail();
                    $enquiryBuildingComponentDetail->enquiry_id                          = $enquiry->id;
                    $enquiryBuildingComponentDetail->building_component_delivery_type_id = $buildingComponentDetail->DeliveryType;
                    $enquiryBuildingComponentDetail->floor                               = $buildingComponentDetail->FloorName;
                    $enquiryBuildingComponentDetail->exd_wall_number                     = $buildingComponentDetail->FloorNumber;
                    $enquiryBuildingComponentDetail->approx_total_area                   = $buildingComponentDetail->TotalArea;
                    $enquiryBuildingComponentDetail->enquiry_building_component_id       = $enquiryBuildingComponent->id;
                    $enquiryBuildingComponentDetail->save();
                    if(!empty($buildingComponentDetail->Layers)) {
                        foreach($buildingComponentDetail->Layers as $buildingComponentLayer) {
                            $buildingComponentDetailLayer                 = new EnquiryBuildingComponentLayer();
                            $buildingComponentDetailLayer->enquiry_id     = $enquiry->id;
                            $buildingComponentDetailLayer->enquiry_bcd_id = $enquiryBuildingComponentDetail->id;
                            $buildingComponentDetailLayer->layer_id       = $buildingComponentLayer->LayerName;
                            $buildingComponentDetailLayer->layer_type_id  = $buildingComponentLayer->LayerType;
                            $buildingComponentDetailLayer->thickness      = $buildingComponentLayer->Thickness;
                            $buildingComponentDetailLayer->breath         = $buildingComponentLayer->Breadth;
                            $buildingComponentDetailLayer->save();
                        }
                    }
                }
                return true;
            }                                
        }
    }
}