<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryTechnicalEstimate;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use Illuminate\Http\Response;
use App\Models\Enquiry;

class TechEstimateController extends Controller
{
    protected $customerEnquiryRepo;
    protected $documentTypeEnquiryRepo;

    public function __construct(CustomerEnquiryRepositoryInterface $customerEnquiryRepository,DocumentTypeEnquiryRepositoryInterface $documentTypeEnquiryRepo){
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
    }

    public function index(Request $request , $id)    {

        $data = EnquiryTechnicalEstimate::where("enquiry_id", $id)->first();

        $enquiry                        =   $this->customerEnquiryRepo->getEnquiryByID($id);
        $result['customer_info']        =   $enquiry->customer ?? ""; 
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
} 