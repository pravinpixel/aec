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
use App\Models\BuildingComponent;
use Illuminate\Http\Response;
use App\Models\Service;
use App\Models\WoodEstimation;
use App\Services\GlobalService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CustomerEnquiryRepository implements CustomerEnquiryRepositoryInterface{
    protected $customer;
    protected $enquiryService;
    protected $enquiry;
    protected $documentTypeEnquiry;
    protected $enquiryBuildingComponentDocument;
    protected $costEstimate;

    function __construct(
        Customer $customer,
        Enquiry $enquiry, 
        Service $service, 
        DocumentTypeEnquiry $documentTypeEnquiry, 
        EnquiryBuildingComponentDocument $enquiryBuildingComponentDocument,
        EnquiryCostEstimate $costEstimate
        ) {
        $this->customer = $customer;
        $this->service = $service;
        $this->enquiry = $enquiry;
        $this->documentTypeEnquiry = $documentTypeEnquiry;
        $this->enquiryBuildingComponentDocument = $enquiryBuildingComponentDocument;
        $this->costEstimate = $costEstimate;
    }

    
    public function create(array  $data){
      
    }

    public function getCustomer($id){
        return $this->customer->find($id);
    }

    public function createCustomerEnquiryProjectInfo($customer_enquiry_number, Customer $customer, array $data)
    {
        return $customer->enquiry()->updateOrCreate(['customer_enquiry_number' => $customer_enquiry_number], $data);
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
        $proposal = MailTemplate::where("enquiry_id", '=', $id)->select([
            DB::raw("null as id"),
            DB::raw("'root' as type"),
            'documentary_id',
            'enquiry_id',
            'proposal_id',
            'version',
            'template_name',
            'comment',
            'status',
            'proposal_status',
            'created_at',
            'updated_at',
            'mail_send_date'
        ]);

        $mailTemplate = PropoalVersions::where("enquiry_id", '=', $id)
                ->select([
                    'id',
                    DB::raw("'child' as type"),
                    'documentary_id',
                    'enquiry_id',
                    'proposal_id',
                    'version',
                    'template_name',
                    'comment',
                    'status',
                    'proposal_status',
                    'created_at',
                    'updated_at',
                    'mail_send_date'
                ])
                ->union($proposal)
                ->orderBy('documentary_id', 'asc')
                ->orderBy('id', 'desc')
                ->get();
        return $mailTemplate;
    }

    public function duplicateProposalVersion($enquiry_id, $proposal_id, $request)
    {
        $result     =   PropoalVersions::where("enquiry_id",$enquiry_id)->where("proposal_id", $proposal_id)->first();
        $totalProposalVersion = PropoalVersions::where(["enquiry_id"=> $enquiry_id, "documentary_id"=> $result->documentary_id])->get()->count();
        $version = 'R'.($totalProposalVersion + 1);  
        $duplicate  =  new PropoalVersions;
        $duplicate  ->  proposal_id         = $proposal_id;
        $duplicate  ->  parent_id           = $result->proposal_id; 
        $duplicate  ->  enquiry_id          = $enquiry_id; 
        $duplicate  ->  documentary_id      = $result->documentary_id; 
        $duplicate  ->  documentary_date    = $result->documentary_date; 
        $duplicate  ->  documentary_content = $result->documentary_content; 
        $duplicate  ->  pdf_file_name       = $result->pdf_file_name;
        $duplicate  ->  template_name       = $result->template_name;
        $duplicate  ->  version             = $version;
        $duplicate  ->  save();  
        return response(['status' => true, 'msg' => trans('enquiry.duplicate_deleted')], Response::HTTP_CREATED);
    }

    public function getCustomerProPosalVersions($id, $proposal_id)
    {
        $data =  MailTemplate::where("enquiry_id", '=', $id)->where('reference_no' , '=', $proposal_id)->get();
    }

    public function getCustomerProPosalByID($id, $proposal_id)
    {
        return MailTemplate::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->get();
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
        $result = MailTemplate::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->update([
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
        $result = MailTemplate::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->delete();
        return response(['status' => true, 'msg' => trans('enquiry.proposal_deleted')], Response::HTTP_CREATED);
    }
    public function duplicateCustomerProPosalByID($id, $proposal_id, $request)
    { 
        $result     =   MailTemplate::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->first();
        $totalProposalVersion = PropoalVersions::where(["enquiry_id"=> $id, "documentary_id" => $result->documentary_id])->get()->count();
        $version = 'R'.($totalProposalVersion + 1);  
        $duplicate  =  new PropoalVersions;
        $duplicate  ->  proposal_id         = $proposal_id;
        $duplicate  ->  parent_id           = $result->proposal_id; 
        $duplicate  ->  enquiry_id          = $id; 
        $duplicate  ->  documentary_id      = $result->documentary_id; 
        $duplicate  ->  documentary_date    = $result->documentary_date; 
        $duplicate  ->  documentary_content = $result->documentary_content; 
        $duplicate  ->  pdf_file_name       = $result->pdf_file_name;
        $duplicate  ->  template_name       = $result->template_name;
        $duplicate  ->  version             = $version;
        $duplicate  ->  save();  
        return response(['status' => true, 'msg' => trans('enquiry.duplicate_deleted')], Response::HTTP_CREATED);
    }

    public function sendCustomerProPosalMail($id, $proposal_id, $request)
    { 
        $result = MailTemplate::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->first();
        $enquiry = $this->getEnquiryByID($id);
        $version = 'R0';
        $details = [ 
            'name'        => $enquiry->customer->full_name ?? $enquiry->customer->contact_person,
            'email'       => $enquiry->customer->email,
            'projectName' => $enquiry->project_name,
            'enquiryNo'   => $enquiry->enquiry_number,
            'version'     => $version,
            'EnqId'       => Crypt::encryptString($id),
            'proposal_id' => Crypt::encryptString($proposal_id),
            'Vid'         => Crypt::encryptString(0),
        ];  
        try {
            Mail::to($enquiry->customer->email)->send(new \App\Mail\ProposalMail($details));
        } catch(Exception $ex) {
            Log::info($ex->getMessage());
        }
        $result->status =  'sent';
        $result->mail_send_date =  now();
        $result->save();
        $enquiry = Enquiry::find($id);
        $enquiry->customer_response = 0;
        $enquiry->save(); 
        return response(['status' => true, 'msg' => trans('The proposal document sent to customer successfully')], Response::HTTP_CREATED);
    }
    public function sendCustomerProPosalMailVersion($id, $proposal_id, $request, $Vid)
    { 
        Log::info('$proposal_id'.$proposal_id);
        MailTemplate::where('enquiry_id', $id)->update(['proposal_status' => 'obsolete','status' => 'obsolete']);
        PropoalVersions::where('enquiry_id', $id)->where('id','!=', $Vid)->update(['proposal_status' => 'obsolete','status' => 'obsolete']); 
        $result = PropoalVersions::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->where("id", '=', $Vid)->first();
        $enquiry = $this->getEnquiryByID($id);
        $details = [ 
            'name'          =>  $enquiry->customer->contact_person,
            'email'         =>  $enquiry->customer->email,
            'projectName'   =>  $enquiry->project_name,
            'enquiryNo'     =>  $enquiry->enquiry_number,
            'version'       =>  $result->version,
            'EnqId'         =>  Crypt::encryptString($id),
            'proposal_id'   =>  Crypt::encryptString($proposal_id),
            'Vid'           =>  Crypt::encryptString($Vid),
        ];  
        Mail::to($enquiry->customer->email)->send(new \App\Mail\ProposalVersions($details));
        $result->status =  'sent';
        $result->mail_send_date =  now();
        $result->save();
        $enquiry = Enquiry::find($id);
        $enquiry->customer_response = 0;
        $enquiry->save(); 
        return response(['status' => true, 'msg' => trans('The proposal document sent to customer successfully')], Response::HTTP_CREATED);
    }
    public function aprovalProPosalMail($id, $proposal_id_, $Vid, $request)
    { 
        
        $enquiry_id     =   Crypt::decryptString($id);
        $proposal_id    =   Crypt::decryptString($proposal_id_);
        $Version_id     =   Crypt::decryptString($Vid);
        $additionalInfo =   ['enquiry_id' => $id, 'proposal_id' => $proposal_id_, 'version_id'=> $Vid];
        if($Version_id == 0) {
            $result = MailTemplate::where(["enquiry_id"=>$enquiry_id, "proposal_id" => $proposal_id])->first();
        }else {
            $result = PropoalVersions::where(["enquiry_id"=>$enquiry_id, "proposal_id" => $proposal_id, "id"=> $Version_id])->first();
        } 
        return view('admin.enquiry.approvals.proposal', compact('result','enquiry_id', 'additionalInfo'));
    }

    public function getEnquiryByCustomerEnquiryNo($customeEnquiryNumber)
    {
        return $this->enquiry->where('customer_enquiry_number', $customeEnquiryNumber)->first();
    }
    
    public function getEnquiryComments($id)
    {
        return EnquiryComments::where("enquiry_id", '=', $id)
                                ->where("type", "=" , "project_information")
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
    public function updateAdminWizardStatus($enquiry, $column, $value= true) 
    {
       $enquiry->update([$column =>  $value]);
       return $enquiry;
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
        return  $enquiry->delete();
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
                    $enquiryBuildingComponentDetail->approx_total_area                   = $buildingComponentDetail->TotalArea;
                    $enquiryBuildingComponentDetail->enquiry_building_component_id       = $enquiryBuildingComponent->id;
                    $total_wall_area +=  $buildingComponentDetail->TotalArea; 
                   
                    $enquiryBuildingComponentDetail->save();
                    if(!empty($buildingComponentDetail->Layers)) {
                        foreach($buildingComponentDetail->Layers as $buildingComponentLayer) {
                            $buildingComponentDetailLayer                 = new EnquiryBuildingComponentLayer();
                            $buildingComponentDetailLayer->enquiry_id     = $enquiry->id;
                            $buildingComponentDetailLayer->enquiry_bcd_id = $enquiryBuildingComponentDetail->id;
                            $buildingComponentDetailLayer->layer_name       = $buildingComponentLayer->LayerName;
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
        $technicalEstimateObj = EnquiryTechnicalEstimate::where('enquiry_id', $enquiry->id)->first();
        if($technicalEstimateObj) {
            $enquiryBuildingComponent = $technicalEstimateObj;
        } else {
            $enquiryBuildingComponent = new EnquiryTechnicalEstimate();
        }

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
        $costEstimateObj  = EnquiryCostEstimate::where('enquiry_id', $enquiry->id)->first();
        if($costEstimateObj) {
            $cost_estimate = $costEstimateObj;
        } else {
            $cost_estimate   =      new EnquiryCostEstimate();
        }
        $estimations     = WoodEstimation::get();
        $costEstimateJson = [];
      
        foreach($buildingComponents as $rootKey => $buildingComponent){
            $components      = [];
            $ComponentsTotalDynamic = [];
            foreach($buildingComponent['building_component_number'] as $key => $wall) {
               
                $components[] =  [
                    'building_component_id' => BuildingComponent::createOrUpdateComponentByEstimate(['building_component_name' => Str::ucfirst($wall['name'])])->id ??'',
                    'type_id'               => '',
                    'DesignScope'           => 100,
                    "Component"             => "",
                    "Type"                  => "",
                    "Sqm"                   => $wall['sqfeet'],
                    "Complexity"            => 1,
                    'Dynamics'              => [],
                    "TotalCost"             => [
                        "PriceM2" => 0,
                        "Sum"     => 0,
                    ],
                    "Rib"=> [
                        "Sum" => 0
                    ]
                ];
                foreach($estimations as $estimation) {
                    $components[$key]['Dynamics'][]      = ["name"=> $estimation->name, 'PriceM2' => '', 'Sum' => ''];
                    $components[$key]["TotalCost"]  = ['PriceM2' => '', 'Sum' => ''];
                    $components[$key]["Rib"]        = ["Sum" => 0];
                }
            }
            foreach($estimations as $estimation) {
                $ComponentsTotalDynamic[]      = ["name"=> $estimation->name, 'PriceM2' => '', 'Sum' => ''];
            }
            $CostEstimate = [ 
                'type'       => 'Building Type 1',
                'totalArea'  => 0,
                'totalPris'  => 0,
                'totalSum'   => 0,
                "Components" =>
                    $components
                ,
                "ComponentsTotals" => [
                    "Sqm"        => '',
                    "complexity" => '',
                    'Dynamics'   => $ComponentsTotalDynamic,
                    "TotalCost"  => [
                        "PriceM2" => 0,
                        "Sum"     => 0,
                    ],
                    "Rib"=> [
                        "Sum" => ""
                    ],
                    "grandTotal" => '',
                ],
            ];
            $costEstimateJson[] = $CostEstimate;
        }
        $resultWood = ['total'=> ['totalArea'=> 0, 'totalSum'=> 0, 'totalPris'=> 0], 'costEstimate'=> $costEstimateJson];
        $cost_estimate  ->    enquiry_id = $enquiry->id;
        $cost_estimate  ->    created_by = Admin()->id;
        $cost_estimate  ->    build_json = json_encode($resultWood);
        $precastComponent = [
            "type"                        => "Building Type 1",
            "total_sqm"                   => 0,
            "total_std_work_hours"        => 0,
            "total_additional_work_hours" => 0,
            "total_hourly_rate"           => 0,
            "total_work_hours"            => 0,
            "engineering_cost"            => 0,
            "total_central_approval"      => 0,
            'total_engineering_cost'      => 0,
            "Components" => [    
                [
                    'precast_component'=> null,
                    'no_of_staircase'=> '',
                    'no_of_new_component'=>'',
                    'no_of_different_floor_height'=> '',
                    'sqm'           => '',
                    'complexity'    => '', 
                    'std_work_hours'=> '',
                    'additional_work_hours'=> '',
                    'hourly_rate'=> '',
                    'total_work_hours'=> '',
                    'engineering_cost'=> '',
                    'total_central_approval'=> '',
                    'total_engineering_cost'=> ''
                ]
            ]
        ];
        $resultPrecast = ['total'=> ['totalArea'=> 0, 'totalSum'=> 0, 'totalPris'=> 0], 'precastEstimate'=> [$precastComponent] ];
        $cost_estimate  ->    precast_build_json = json_encode($resultPrecast);
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
                        
                        $detail[] = array_merge( $toArrayDetails, $layer , ['LastAction' => $enquiryBuildingComponentDetail->updated_at->format('Y-m-d h:m:s')]);
                    }
                    $buildingComponent['detail']= $detail;
                }
                $componentAdditionalData = [
                    'wall' => $buildingComponentMaster->building_component_name,
                    'top_position' => $buildingComponentMaster->top_position,
                    'bottom_position' => $buildingComponentMaster->bottom_position,
                    'label' =>  $buildingComponentMaster->label,
                    'icon' => $buildingComponentMaster->building_component_icon,
                    'wallId' => $buildingComponentMaster->id,
                    'totalWallArea' => $enquiryBuildingComponent->total_wall_area, 
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

    public function updateProjectById($id, $status)
    {
        $enquiry = Enquiry::find($id)
                    ->update(['project_status' => $status, 'created_by' => Admin()->id]);
        return $enquiry;
    }
    
    public function AddEnquiryReferenceNo($enquiry)
    {
        if(is_null($enquiry->enquiry_number) || $enquiry->enquiry_number == 'Draft') {
            $enquiry->enquiry_number = GlobalService::enquiryNumber();
            if($enquiry->save()){
                return GlobalService::updateConfig('ENQ');
            }
        }
        return false;
    }

    public function createEnquiryBuildingComponentDocument($data)
    {
        return $this->enquiryBuildingComponentDocument->create($data);
    }

    public function getCostEstimateByEnquiryId($id)
    {
        return $this->costEstimate->where('enquiry_id', $id)->first();
    }

    public function moveToCancel($id)
    {
        $enquiry = $this->enquiry->where('customer_id', Customer()->id)->find($id);
        if(!empty($enquiry)){
            return $enquiry->update(['status' => 'Closed']);
        }
        return false;
    }

    public function moveToActive($id)
    {
        $enquiry = $this->enquiry->where('customer_id', Customer()->id)->find($id);
        $newEnquiry = $enquiry->replicateRow();
        if($newEnquiry){
            $enquiry->delete();
            return true;
        }
        return false;
    }

    public function deleteAndGetBuildingComponentDocument($id)
    {
        $document = $this->enquiryBuildingComponentDocument->find($id);
        $enquiry = $this->enquiry->find($document->enquiry_id);
        if($document->delete()) {
            return $this->getBuildingComponent($enquiry);
        }
        return [];
    }

    public function updateNewEnquiryStatus($id)
    {
        $enquiry = $this->enquiry->find($id);
        $enquiry->is_new_enquiry = 0;
        return $enquiry->save();
    }

    public function updateFollowUp($id, $data)
    {
        return $this->enquiry->find($id)->update($data);
    }

    
    public function manualApproveFromAdmin($enquiryId)
    {
        DB::beginTransaction();
        try {
            $rootVersion = MailTemplate::where(['enquiry_id'=> $enquiryId, 'proposal_status' => 'not_send'])->latest()->first();
            $childVersion = PropoalVersions::where(['enquiry_id'=> $enquiryId, 'proposal_status' => 'not_send'])->latest()->first();
            $updateValue = ['is_admin_approved' => true, 'approved_admin_id'=> Admin()->id, 'proposal_status' => 'approved','status' => 'approved'];
            MailTemplate::where('enquiry_id', $enquiryId)->update(['proposal_status' => 'obsolete']);
            PropoalVersions::where('enquiry_id', $enquiryId)->update(['proposal_status' => 'obsolete']);     
            if(!isset($childVersion->created_at)) {
                MailTemplate::where(['enquiry_id'=> $enquiryId, 'proposal_id' => $rootVersion->proposal_id])
                                ->update($updateValue);  
            }else if($rootVersion->created_at > $childVersion->created_at) {
                MailTemplate::where(['enquiry_id'=> $enquiryId, 'proposal_id' => $rootVersion->proposal_id])
                                ->update($updateValue);  
            } else {
                PropoalVersions::where(['enquiry_id'=> $enquiryId, 'proposal_id'=> $childVersion->id])
                        ->update($updateValue);
            }
            DB::commit();
            return true;
        } catch(Exception $ex) {
            DB::rollBack();
            Log::info($ex->getMessage());
        }
      
    }

}
