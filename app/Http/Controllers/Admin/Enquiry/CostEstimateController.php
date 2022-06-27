<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Interfaces\CostEstimateRepositoryInterface;
use App\Models\CostEstimationDetail;
use App\Models\CostEstimationCalculation;
use App\Models\MasterCalculation;
use Illuminate\Http\Request;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use Illuminate\Http\Response;
use App\Models\BuildingComponent;
use App\Models\CostEstimateHistory;
use App\Models\Type;
use App\Models\EnquiryCostEstimate;
use App\Models\Enquiry;



class  CostEstimateController extends Controller
{
    protected $customerEnquiryRepo;
    protected $documentTypeEnquiryRepo;
    protected $costEstimate;

    public function __construct(
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository,
        DocumentTypeEnquiryRepositoryInterface $documentTypeEnquiryRepo,
        CostEstimateRepositoryInterface $costEstimate
    ){
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
        $this->costEstimate            = $costEstimate;
    }

    public function index(Request $request , $id) {
        $data                       =   EnquiryCostEstimate::where("enquiry_id", $id)->first();
        $others                     =   ['assign_to' => $data->assign_to]; 
        $enquiry                    =   $this->customerEnquiryRepo->getEnquiryByID($id);
        $result["enquiry"]          =   $enquiry ?? "";
        $result["others"]           =   $others;
        $result['project_type']     =   $enquiry->projectType->project_type_name ?? '';
        $result['cost_estimation']  =   isset($data) ? json_decode($data->build_json) : [];
        return  $result;
    }

    public function CostEstimateData()    {
        
        $data = CostEstimationDetail::select('cost_estimation_detail.*')->where('status','=','1')->orderBy('id', 'asc')->get()->toArray();
        $data['component']  = BuildingComponent::where('is_active','=','1')->get();
        $data['type']       = Type::where('is_active','=','1')->get()->toArray();
        return $data;
    }
    public function CostEstimateMasterValue(Request $request) {
       return MasterCalculation::where('component_id',$request->component_id)
                                        ->where('type_id',$request->type_id)
                                        ->first(); 
    }
    public function store(Request $request) {
        $data    = $request->input("data");
        $id      = $request->input("enquiry_id");
        $type    = $request->input("type");
        $history = $request->input("history", false);
        $html    = $request->input("html");
        $costEstimate = EnquiryCostEstimate::where('enquiry_id',$id)->first();
        if(!empty($costEstimate)) {
            $costEstimate->enquiry_id           = $id;
            if($type == 'wood') {
                $costEstimate->build_json           =  json_encode($data);
            } else {
                $costEstimate->precast_build_json   =  json_encode($data);
            }
            $costEstimate->total_cost           =  $request->total;
            $costEstimate->updated_by           = Admin()->id;
            $costEstimate->assign_for_status    = (Admin()->id == $costEstimate->assign_to ? 1 : 0);
        }  else {
            $costEstimate  =  new EnquiryCostEstimate();
            $costEstimate->enquiry_id           = $id;
            if($type == 'wood') {
                $costEstimate->build_json           =  json_encode($data);
            } else {
                $costEstimate->precast_build_json   =  json_encode($data);
            }
            $costEstimate->total_cost           =  $request->total;
            $costEstimate->updated_by           = Admin()->id;
            $costEstimate->assign_for_status    = 0;
        }
        $costEstimate->save();
        $enquiry = Enquiry::find($id);
        if($history) {
            $data = [
                'enquiry_id'       => $enquiry->id,
                'type'             => $type,
                'cost_estimate_id' => $costEstimate->id,
                'history'          => $html,
                'created_by'       => Admin()->id
            ];
            $this->storeCostEstimateHistory($data);
        }
        if(Admin()->id == $costEstimate->assign_by || Admin()->id == 1){
            $this->costEstimate->assignUser($enquiry, Admin()->id);
            $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'cost_estimation_status');
        } 
        return response(['status' => true,  'msg' => trans('technicalEstimate.status_updated')], Response::HTTP_CREATED);
    }

    public function storeCostEstimateHistory($data)
    {   
        return CostEstimateHistory::create($data);
    }   

    public function assignUser($enquiry_id, Request $request)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($enquiry_id);
        if($request->assign_to == null) {
            $enquiry = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'cost_estimation_status', false);
            $result =  $this->costEstimate->assignUser($enquiry, Admin()->id);
        } else {
            $type = $request->type ?? '';
            $enquiry = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'cost_estimation_status', false);
            $result =  $this->costEstimate->assignUser($enquiry,$request->assign_to,  $type);
        }
        if($result){
            return response(['status' => true, 'msg' => __('enquiry.assign_user_successfully')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function removeUser($enquiry_id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($enquiry_id);
        $enquiry = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'cost_estimation_status', false);
        $result =  $this->costEstimate->removeUser($enquiry_id);
        if($result){
            return response(['status' => true, 'msg' => __('enquiry.assign_removed_successfully')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function updateStatus($enquiry_id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($enquiry_id);
        $result = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'cost_estimation_status', true);
        if($result){
            return response(['status' => true]);
        }
        return response(['status' => false]);
    }

    public function getHistory($id, $type)
    {
        return CostEstimateHistory::where('created_by', '!=', Admin()->id)
                                    ->where(['enquiry_id'=> $id, 'type'=> $type])
                                    ->get();
    }

}