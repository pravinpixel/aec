<?php

namespace App\Repositories;

use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Customer;
use App\Models\DocumentTypeEnquiry;
use App\Models\Enquiry;
use App\Models\EnquiryBuildingComponent;
use App\Models\EnquiryBuildingComponentDetail;
use App\Models\EnquiryBuildingComponentDocument;
use App\Models\EnquiryBuildingComponentLayer;
use App\Models\EnquiryService;
use App\Models\EnquiryTechnicalEstimate;
use App\Models\EnquiryCostEstimate;
use App\Models\EnquiryComments;
use App\Models\Admin\MailTemplate;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\PropoalVersions;
use Illuminate\Http\Response;
use App\Models\Service;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class CustomerEnquiryRepository implements CustomerEnquiryRepositoryInterface{
    protected $customer;
    protected $enquiryService;
    protected $enquiry;
    protected $documentTypeEnquiry;
    protected $enquiryBuildingComponentDocument;

    function __construct(Customer $customer,Enquiry $enquiry, Service $service, DocumentTypeEnquiry $documentTypeEnquiry, EnquiryBuildingComponentDocument $enquiryBuildingComponentDocument)
    {
        $this->customer = $customer;
        $this->service = $service;
        $this->enquiry = $enquiry;
        $this->documentTypeEnquiry = $documentTypeEnquiry;
        $this->enquiryBuildingComponentDocument = $enquiryBuildingComponentDocument;
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

    public function getCustomerProPosal($id)
    {
        return MailTemplate::where("enquirie_id", '=', $id)
                            ->with('getVersions')
                            ->get();
         
    }
    public function getCustomerProPosalVersions($id, $proposal_id)
    {
        $data =  MailTemplate::where("enquirie_id", '=', $id)->where('reference_no' , '=', $proposal_id)->get();
        
    }
    public function getCustomerProPosalByID($id, $proposal_id)
    {
        return MailTemplate::where("enquirie_id", '=', $id)->where("proposal_id", '=', $proposal_id)->get();
    }
    public function getCustomerProPosalVersionByID($id, $proposal_id, $Vid)
    {
        return PropoalVersions::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->where("id", '=', $Vid)->get();
    }

    public function updateCustomerProPosalVersionByID($id, $proposal_id, $request, $Vid)
    {
        $result = PropoalVersions::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->where("id", '=', $Vid)->update([
            'documentary_content' =>  $request->mail_content
        ]);
        return response(['status' => true, 'msg' => trans('enquiry.proposal_updated')], Response::HTTP_CREATED);
    }
    public function deleteCustomerProPosalVersionByID($id, $proposal_id, $request, $Vid)
    {
        $result = PropoalVersions::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->where("id", '=', $Vid)->delete();
        return response(['status' => true, 'msg' => trans('enquiry.proposal_deleted')], Response::HTTP_CREATED);
    }
    public function updateCustomerProPosalByID($id, $proposal_id, $request)
    {
        $result = MailTemplate::where("enquirie_id", '=', $id)->where("proposal_id", '=', $proposal_id)->update([
            'documentary_content' =>  $request->mail_content
        ]);
        return response(['status' => true, 'msg' => trans('enquiry.proposal_updated')], Response::HTTP_CREATED);
    }
    public function updateCustomerProPosalByVersionByID($id, $proposal_id, $request, $Vid)
    {
        $result = PropoalVersions::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->where("id", '=', $Vid)->update([
            'documentary_content' =>  $request->mail_content
        ]);
        return response(['status' => true, 'msg' => trans('enquiry.proposal_updated')], Response::HTTP_CREATED);
    }

    public function deleteCustomerProPosalByID($id, $proposal_id, $request)
    {
        $result = MailTemplate::where("enquirie_id", '=', $id)->where("proposal_id", '=', $proposal_id)->delete();
        return response(['status' => true, 'msg' => trans('enquiry.proposal_deleted')], Response::HTTP_CREATED);
    }
    public function duplicateCustomerProPosalByID($id, $proposal_id, $request)
    { 
        $result     =   MailTemplate::where("enquirie_id", '=', $id)->where("proposal_id", '=', $proposal_id)->first();
        $duplicate  =  new PropoalVersions;
        $duplicate  ->  proposal_id         = $proposal_id;
        $duplicate  ->  parent_id           = $result->proposal_id; 
        $duplicate  ->  enquiry_id          = $id; 
        $duplicate  ->  documentary_id      = $result->documentary_id; 
        $duplicate  ->  documentary_date    = $result->documentary_date; 
        $duplicate  ->  documentary_content = $result->documentary_content; 
        $duplicate  ->  pdf_file_name       = $result->pdf_file_name;
        $duplicate  ->  save();  
        return response(['status' => true, 'msg' => trans('enquiry.duplicate_deleted')], Response::HTTP_CREATED);
    }

    public function sendCustomerProPosalMail($id, $proposal_id, $request)
    { 
        $result = MailTemplate::where("enquirie_id", '=', $id)->where("proposal_id", '=', $proposal_id)->first();
        $user   = $this->enquiry->with('customer')->find($id);
        $details = [ 
            'name'          =>  $user->customer->full_name,
            'email'         =>  $user->customer->email,
            'EnqId'         =>  Crypt::encryptString($id),
            'proposal_id'   =>  Crypt::encryptString($proposal_id),
            'Vid'           =>  Crypt::encryptString(0),
        ];  

        Mail::to('prabhukannan1210@gmail.com')->send(new \App\Mail\ProposalMail($details));
        $result->status =  'sent';
        $result->mail_send_date =  now();
        $result->save();
        $enquiry = Enquiry::find($id);
        $enquiry->customer_response = 0;
        $enquiry->save(); 
        return response(['status' => true, 'msg' => trans('enquiry.duplicate_deleted')], Response::HTTP_CREATED);
    }
    public function sendCustomerProPosalMailVersion($id, $proposal_id, $request, $Vid)
    { 
        $result = PropoalVersions::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->where("id", '=', $Vid)->first();
 
        $user   = $this->enquiry->with('customer')->find($id);
         
        $details = [ 
            'name'          =>  $user->customer->full_name,
            'email'         =>  $user->customer->email,
            'EnqId'         =>  Crypt::encryptString($id),
            'proposal_id'   =>  Crypt::encryptString($proposal_id),
            'Vid'     =>  Crypt::encryptString($Vid),
        ];  
        Mail::to($user->customer->email)->send(new \App\Mail\ProposalVersions($details));
        $result->status =  'sent';
        $result->mail_send_date =  now();
        $result->save();
        $enquiry = Enquiry::find($id);
        $enquiry->customer_response = 0;
        $enquiry->save(); 
        return response(['status' => true, 'msg' => trans('enquiry.duplicate_deleted')], Response::HTTP_CREATED);
    }
    public function aprovalProPosalMail($id, $proposal_id, $Vid, $request)
    { 
        $enquiry_id     =   Crypt::decryptString($id);
        $proposal_id    =   Crypt::decryptString($proposal_id);
        $Vid            =   Crypt::decryptString($Vid);

        if($Vid == 0) {
               $result = MailTemplate::where("enquirie_id", '=', $enquiry_id)->where("proposal_id", '=', $proposal_id)->first();
            return view('admin.enquiry.approvals.proposal', compact('result' ,$result));
        }else {
            $result = PropoalVersions::where("enquiry_id", '=', $enquiry_id)->where("proposal_id", '=', $proposal_id)->where("id", '=', $Vid)->first();
            return view('admin.enquiry.approvals.proposal', compact('result' ,$result));
        } 
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
    public function updateAdminWizardStatus($enquiry, $column) 
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

    public function delete($id)
    {
        $enquiry = $this->enquiry->find($id);
        return  $this->enquiry->delete();
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
            $building_component_number[] = ["name"=> $buildingComponent->WallName ?? $buildingComponent->building_component_name,"sqfeet"=> $total_wall_area];
        }
        $build_json = ['building_number' => 1, 'building_component_number' => $building_component_number, "total_component_area" =>  $total_wall_area_all];
        $enquiryBuildingComponent->enquiry_id = $enquiry->id;
        $enquiryBuildingComponent->total_wall_area = $total_wall_area_all;// $enquiry->id;
        $enquiryBuildingComponent->build_json = json_encode([$build_json]);
        $enquiryBuildingComponent->save();
        return true;    
    }

    public function storeCostEstimation($enquiry,$buildingComponents) 
    {   
        EnquiryCostEstimate::where('enquiry_id', $enquiry->id)->delete();

        $cost_estimate   =      new EnquiryCostEstimate();
        $result =   [
                        'Components' => [ 
                            [
                                "Component"     => "",
                                "Type"          => "", 
                                "sqm"           => "",
                                "complexity"    => "", 
                                "Details" => [
                                    "PriceM2"   => "",
                                    "Sum"       => ""
                                ],
                                "Statistics" => [
                                    "PriceM2"   => "", 
                                    "Sum"       => "", 
                                ],
                                "CadCam" => [
                                    "PriceM2"   => "",
                                    "Sum"       => "", 
                                ],
                                "Logistics" => [
                                    "PriceM2"   => "", 
                                    "Sum"       => "",
                                ],
                                "TotalCost" => [
                                    "PriceM2"   => "", 
                                    "Sum"       => "", 
                                ]
                            ]
                        ],
                    "ComponentsTotals" => [
                        "sqm"           => 0,
                        "complexity"    => 0, 
                        "Details" =>[
                            "PriceM2"   => 0,
                            "Sum"       => 0
                        ],
                        "Statistics" => [
                            "PriceM2"   => 0, 
                            "Sum"       => 0, 
                        ],
                        "CadCam" =>[
                            "PriceM2"   => 0,
                            "Sum"       => 0, 
                        ],
                        "Logistics" =>[
                            "PriceM2"   => 0, 
                            "Sum"       => 0,
                        ],
                        "TotalCost" =>[
                            "PriceM2"   => 0, 
                            "Sum"       => 0, 
                        ],
                        "grandTotal"    => 0, 
                    ],
                    'enquiry_id' =>  $enquiry->id
                ];
        $cost_estimate  ->    enquiry_id = $enquiry->id;
        $cost_estimate  ->    created_by = Customer()->id;
        $cost_estimate  ->    build_json = json_encode($result);
        $cost_estimate  ->    save();
        
        return true;    
    }

    public function updateTechnicalEstimateCost($enquiry,$buildingComponents) 
    {   
        EnquiryTechnicalEstimate::where('enquiry_id', $enquiry->id)->delete(); 
        
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
        if($enquiry->building_component_process_type == 1){
            return $enquiry->enquiryBuildingComponentDocument()->get();
        }
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
            'building_component_process_type'=> $enquiry->building_component_process_type,
            
            // Tabs Status
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

    public function createEnquiryBuildingComponentDocument($enquiry, $additionalData)
    {
        return $this->enquiryBuildingComponentDocument
                        ->updateOrcreate([
                            'enquiry_id' => $enquiry->id, 
                            'customer_id' => Customer()->id
                        ],$additionalData);
    }

    public function moveToCancel($id)
    {
        $enquiry = $this->enquiry->where('customer_id', Customer()->id)->find($id);
        if(!empty($enquiry)){
            return $enquiry->update(['status' => 'Closed']);
        }
        return false;
    }

}