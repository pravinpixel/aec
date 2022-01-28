<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryTechnicalEstimate;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use Illuminate\Http\Response;


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
        $result['building_component']   =   isset($data->build_json) ? json_decode($data->build_json ): "x`";
        $result['ifc_model_uploads']    =   $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry->id) ?? "";
        
        return  $result;
        // build_json   
    }
    public function update(Request $request , $id)
    {
        $data = $request->input("data");
      
        EnquiryTechnicalEstimate::updateOrCreate(['enquiry_id'=>1],[
            'build_json'    => json_encode($data),
            'total_wall_area'    =>  1 ,
            'wall'    =>  1 ,
        ]);

        // $enquiry    =   $this->customerEnquiryRepo->getEnquiryByID($id);
        // $tech->build_json = json_encode($request->input());
        // $tech->enquiry_id = 1;
        // $tech->total_wall_area = 2;
        // $tech->wall = 2;

        // $tech->save();
        
        // $data   = $request->data;
        // $enquiry =  $this->customerEnquiryRepo->getEnquiry($id);
        // $dataObj = json_decode (json_encode ($data), FALSE);
        // if(!empty($dataObj)) {
        //     $response = $this->customerEnquiryRepo->updateTechnicalEstimateCost($enquiry ,$dataObj);
        // }
        return response(['status' => true,  'msg' => trans('technicalEstimate.status_updated')], Response::HTTP_CREATED);
    }
} 