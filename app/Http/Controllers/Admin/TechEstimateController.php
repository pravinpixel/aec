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
use App\Models\TechnicalEstimateHistory;
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
        $history = $request->input("history", false);
        $html    = $request->input("html");
        if($data == [])  {
            return response(['status' => true,  'msg' => trans('You can not delete all building !')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $technicalEstimate = EnquiryTechnicalEstimate::where('enquiry_id',$id)->first();
        if(!empty($technicalEstimate)) {
            $technicalEstimate->enquiry_id           = $id;
            $technicalEstimate->build_json           =  json_encode($data);
            $technicalEstimate->total_wall_area      =  1;
            $technicalEstimate->wall                 =  1;
            $technicalEstimate->updated_by           = Admin()->id;
            $technicalEstimate->assign_for_status    = (Admin()->id == $technicalEstimate->assign_to ? 1 : 0);
        }  else {
            $technicalEstimate  =  new EnquiryTechnicalEstimate();
            $technicalEstimate->enquiry_id           = $id;
            $technicalEstimate->build_json           =  json_encode($data);
            $technicalEstimate->total_wall_area      =  1;
            $technicalEstimate->wall                 =  1;
            $technicalEstimate->updated_by           = Admin()->id;
            $technicalEstimate->assign_for_status    = 0;
        }
        $technicalEstimate->save();
        $enquiry = Enquiry::find($id);  
        if($history) {
            $data = [
                'enquiry_id'            => $enquiry->id,
                'technical_estimate_id' => $technicalEstimate->id,
                'history'               => $html,
                'created_by'            => Admin()->id
            ];
            $this->storeTechEstimateHistory($data);
        }
        if(Admin()->id == $technicalEstimate->assign_by || Admin()->id == 1){
            $this->technicalEstimate->assignUser($enquiry, Admin()->id);
            $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'technical_estimation_status');
        } 

        return response(['status' => true,  'msg' => trans('technicalEstimate.status_updated')], Response::HTTP_CREATED);
    }

    public function storeTechEstimateHistory($data) 
    {
        return TechnicalEstimateHistory::create($data);
    }

    public function assignUser($enquiry_id, Request $request)
    {   
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($enquiry_id);
        if($request->assign_to == null) {
            $enquiry = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'technical_estimation_status', false);
            $result =  $this->technicalEstimate->assignUser($enquiry, Admin()->id);
        } else {
            $type = $request->type ?? '';
            $enquiry = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'technical_estimation_status', false);
            $result = $this->technicalEstimate->assignUser($enquiry,$request->assign_to, $type);
        }
        if($result){
            return response(['status' => true, 'msg' => __('enquiry.assign_user_successfully')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }
    
    public function removeUser($enquiry_id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($enquiry_id);
        $enquiry = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'technical_estimation_status', false);
        $result =  $this->technicalEstimate->removeUser($enquiry_id);
        if($result){
            return response(['status' => true, 'msg' => __('enquiry.assign_removed_successfully')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function updateStatus($enquiry_id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($enquiry_id);
        $result = $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'technical_estimation_status', true);
        if($result){
            return response(['status' => true]);
        }
        return response(['status' => false]);
    }

    public function getHistory($id)
    {
        return TechnicalEstimateHistory::where('enquiry_id', $id)
                                    ->limit(10)  
                                    ->get();
    }

} 