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
use App\Models\EnquiryTechnicalEstimate;
use App\Models\EnquiryComments;


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
                        ->when(Customer(), function($q){
                            $q->where('customer_id', Customer()->id);
                        })
                    ->find($id);
    }

    public function getEnquiryByID($id) 
    {
        return $this->enquiry->with('customer')->find($id);
    }

    public function getEnquiryComments($id) 
    {
        return EnquiryComments::where("enquiry_id", '=', $id)
                                ->where("type", "=" , "project_infomation")
                                ->get();
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

    public function updateWizardStatus($enquiry, $column) 
    {
        return $enquiry->update([$column => true]);
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
        EnquiryBuildingComponentLayer::where('enquiry_id', $enquiry->id)->delete();
        EnquiryBuildingComponentDetail::where('enquiry_id', $enquiry->id)->delete();
        EnquiryBuildingComponent::where('enquiry_id', $enquiry->id)->delete();

        foreach($buildingComponents as $buildingComponent) {
            $total_wall_area = 0;
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
                    $total_wall_area +=  $buildingComponentDetail->TotalArea; 
                   
                    $enquiryBuildingComponentDetail->save();
                    if(!empty($buildingComponentDetail->Layers)) {
                        foreach($buildingComponentDetail->Layers as $buildingComponentLayer) {
                            $buildingComponentDetailLayer                 = new EnquiryBuildingComponentLayer();
                            $buildingComponentDetailLayer->enquiry_id     = $enquiry->id;
                            $buildingComponentDetailLayer->enquiry_bcd_id = $enquiryBuildingComponentDetail->id;
                            $buildingComponentDetailLayer->layer_id       = $buildingComponentLayer->LayerName;
                            $buildingComponentDetailLayer->thickness      = $buildingComponentLayer->Thickness;
                            $buildingComponentDetailLayer->breath         = $buildingComponentLayer->Breadth;
                            $buildingComponentDetailLayer->save();
                        }
                    }
                }
                $enquiryBuildingComponent->total_wall_area = $total_wall_area;
                $enquiryBuildingComponent->save();
            }                            
        }
        return true;    
    }

    public function storeTechnicalEstimateCost($enquiry,$buildingComponents) 
    {   
        EnquiryTechnicalEstimate::where('enquiry_id', $enquiry->id)->delete();
       
        $enquiryBuildingComponent = new EnquiryTechnicalEstimate();

        $building_component_number = [];
        $total_wall_area_all = 0;
        foreach($buildingComponents as $buildingComponent) {
          
            $total_wall_area = 0;
           
            if($enquiryBuildingComponent && !empty($buildingComponent->Details)) {

                foreach($buildingComponent->Details as $buildingComponentDetail) {
                    $total_wall_area +=  $buildingComponentDetail->TotalArea; 
                   
                }
                $total_wall_area_all += $total_wall_area; 
                $enquiryBuildingComponent->total_wall_area = $total_wall_area;
               
            }
            $building_component_number[] = ["name"=> $buildingComponent->WallName,"sqfeet"=> $total_wall_area];
        }
        $build_json = ['building_number' => 1, 'building_component_number' => $building_component_number, "total_component_area" =>  $total_wall_area_all];
        $enquiryBuildingComponent->enquiry_id = $enquiry->id;
        $enquiryBuildingComponent->total_wall_area = $total_wall_area_all;// $enquiry->id;
        \Log::info(json_encode([$build_json]));
        $enquiryBuildingComponent->build_json = json_encode([$build_json]);
        $enquiryBuildingComponent->save();
        return true;    
    }

    public function updateTechnicalEstimateCost($enquiry,$buildingComponents) 
    {   
        EnquiryTechnicalEstimate::where('enquiry_id', $enquiry->id)->delete(); 
        // build_json
        foreach($buildingComponents as $buildingComponent) {
            $enquiryBuildingComponent = new EnquiryTechnicalEstimate();
            $enquiryBuildingComponent->enquiry_id = $enquiry->id;
            $enquiryBuildingComponent->wall = $buildingComponent->wall;
            $enquiryBuildingComponent->total_wall_area = $buildingComponent->total_wall_area;
            $enquiryBuildingComponent->save(); 
        }
        return true;    
    }

    public function getBuildingComponent($enquiry) 
    {
        $enquiryBuildingComponents = $enquiry->enquiryBuildingComponent()->get();
        $buildingComponentData = [];

        foreach( $enquiryBuildingComponents as  $enquiryBuildingComponent) {
                $buildingComponent = [];  $detail = [];
                $buildingComponentMaster = $enquiryBuildingComponent->buildingComponent;
                if($enquiryBuildingComponent->enquiryBuildingComponentDetails()->exists()) {
                    $enquiryBuildingComponentDetails = $enquiryBuildingComponent->enquiryBuildingComponentDetails()
                                                                                ->with('deliveryType')
                                                                                ->get();
                    foreach($enquiryBuildingComponentDetails as $enquiryBuildingComponentDetail) {
                        $layer = [];
                        if($enquiryBuildingComponentDetail->enquiryBuildingComponentLayers()->exists()) {
                            $enquiryBuildingComponentLayers = $enquiryBuildingComponentDetail->enquiryBuildingComponentLayers()
                                                                                            ->with(['layerType','layer'])
                                                                                            ->get();
                            foreach($enquiryBuildingComponentLayers as $enquiryBuildingComponentLayer) {
                                $layer['layer'][] = $enquiryBuildingComponentLayer;
                            }
                        }
                        $toArrayDetails = $enquiryBuildingComponentDetail->toArray();
                        $detail[] = array_merge( $toArrayDetails, $layer);
                    }
                    $buildingComponent['detail']= $detail;
                }
                $componentAdditionalData = [
                    'wall' => $buildingComponentMaster->building_component_name,
                    'top_position' => $buildingComponentMaster->top_position,
                    'bottom_position' => $buildingComponentMaster->bottom_position,
                    'icon' => $buildingComponentMaster->building_component_icon,
                    'wallId' => $buildingComponentMaster->id,
                    'totalWallArea' => $enquiryBuildingComponent->total_wall_area
                ];
                $buildingComponentData[] = (object)array_merge($buildingComponent, $componentAdditionalData);
        }
        return $buildingComponentData;
    } 

    public function formatEnqInfo ($enquiry)   {
            return [
                'enquiry_number'        =>  $enquiry->enquiry_number,
                'enquiry_date'          =>  $enquiry->enquiry_date,
                'contact_person'        =>  $enquiry->customer->contact_person, 
                'project_name'          => $enquiry->project_name,
            ];
    }
    public function formatProjectInfo($enquiry) 
    {
        return [
            
            'company_name'         => $enquiry->customer->company_name,
            'contact_person'       => $enquiry->customer->contact_person,
            'mobile_no'            => $enquiry->customer->mobile_no,
            'secondary_mobile_no'  => $enquiry->secondary_mobile_no,
            'project_name'         => $enquiry->project_name,
            'zipcode'              => $enquiry->zipcode,
            'state'                => $enquiry->state,
            'building_type_id'     => $enquiry->building_type_id,
            'project_type_id'      => $enquiry->project_type_id,
            'project_date'         => $enquiry->project_date,
            'site_address'         => $enquiry->site_address,
            'place'                => $enquiry->place,
            'country'              => $enquiry->country,
            'no_of_building'       => $enquiry->no_of_building,
            'delivery_type_id'     => $enquiry->delivery_type_id,
            'project_delivery_date'=> $enquiry->project_delivery_date,
            'building_type'        =>  $enquiry->buildingType,
            'project_type'         =>  $enquiry->projectType,
            'delivery_type'        => $enquiry->deliveryType,
        ];
    }

    public function updateStatusById($enquiry, $status)
    {
        if($enquiry->project_info == 1 
        && $enquiry->service == 1
        && $enquiry->ifc_model_upload == 1
        && $enquiry->building_component == 1) {
            $enquiry->update(['status' => $status]);
            return  $status;
        }
        return false;
    }
}