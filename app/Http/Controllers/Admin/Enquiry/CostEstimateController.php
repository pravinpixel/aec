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
         
        $data   = $request->input("data");
        $id     = $request->input("data.enquiry_id"); 
        EnquiryCostEstimate::updateOrCreate(['enquiry_id'=>$id],[
            'build_json'    => json_encode($data),
            'created_by' => "Admin"
        ]); 
        $enquiry = Enquiry::find($id);
        $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'cost_estimation_status');
        return response(['status' => true,  'msg' => trans('technicalEstimate.status_updated')], Response::HTTP_CREATED);
    }

    public function assignUser($enquiry_id, Request $request)
    {
        $result =  $this->costEstimate->assignUser($enquiry_id,$request->assign_to);
        if($result){
            return response(['status' => true, 'msg' => __('enquiry.assign_user_successfully')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }
}