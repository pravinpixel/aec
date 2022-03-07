<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryTechnicalEstimate;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use App\Interfaces\TechnicalEstimateRepositoryInterface;
use Illuminate\Http\Response;
use App\Models\Enquiry;
use App\Repositories\TechnicalEstimateRepository;

class TechEstimateController extends Controller
{
    protected $customerEnquiryRepo;
    protected $documentTypeEnquiryRepo;

    public function __construct(
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository,
        DocumentTypeEnquiryRepositoryInterface $documentTypeEnquiryRepo,
        TechnicalEstimateRepositoryInterface $technicalEstimate
    ){
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
        $this->technicalEstimate       = $technicalEstimate;
    }

    public function index(Request $request , $id)    {

        $data = EnquiryTechnicalEstimate::where("enquiry_id", $id)->first();
        $others                         =   ['assign_to' => $data->assign_to]; 
        $enquiry                        =   $this->customerEnquiryRepo->getEnquiryByID($id);
        $result['customer_info']        =   $enquiry->customer ?? ""; 
        $result['others']               =   $others;
        $result['project_type']         =   $enquiry->projectType->project_type_name ?? '';
        $result["enquiry"]              =   $enquiry ?? "";
        $result['building_component']   =   isset($data) ? json_decode($data->build_json) : [];

        $result['ifc_model_uploads']    =   $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry->id) ?? "";
        
        return  $result;
        // build_json   
    }
    public function update(Request $request , $id)
    {
        $data = $request->input("data");
        if($data == [])  {
            return response(['status' => true,  'msg' => trans('You can not delete all building !')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        EnquiryTechnicalEstimate::updateOrCreate(['enquiry_id'=>$id],[
            'build_json'            =>  json_encode($data),
            'total_wall_area'       =>  1 ,
            'wall'                  =>  1 ,
        ]);
        $enquiry = Enquiry::find($id);
        $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'technical_estimation_status');
        return response(['status' => true,  'msg' => trans('technicalEstimate.status_updated')], Response::HTTP_CREATED);
    }

    public function assignUser($enquiry_id, Request $request)
    {   
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($enquiry_id);
        if($request->assign_to == null) {
            $enquiry = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'technical_estimation_status', false);
            $result =  $this->technicalEstimate->assignUser($enquiry, Admin()->id);
        } else {
            $result = $this->technicalEstimate->assignUser($enquiry,$request->assign_to);
        }
        if($result){
            return response(['status' => true, 'msg' => __('enquiry.assign_user_successfully')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }
} 