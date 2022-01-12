<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Interfaces\BuildingComponentRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Comment;
use App\Models\Config;
use App\Models\DocumentType;
use App\Models\DocumentTypeEnquiry;
use App\Services\GlobalService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Enquiry;
use Exception;
use Illuminate\Support\Facades\DB;

class EnquiryController extends Controller
{
 
    protected $customerEnquiryRepo;
    protected $serviceRepo;
    protected $documentTypeRepo;
    protected $buildingComponent;
    protected $commentRepo;
    protected $documentTypeEnquiryRepo;

    public function __construct(
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository, 
        ServiceRepositoryInterface $serviceRepo,
        DocumentTypeRepositoryInterface $documentType,
        BuildingComponentRepositoryInterface $buildingComponent,
        CommentRepositoryInterface $comment,
        DocumentTypeEnquiryRepositoryInterface $documentTypeEnquiryRepo
    ){
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
        $this->serviceRepo             = $serviceRepo;
        $this->documentTypeRepo        = $documentType;
        $this->buildingComponent       = $buildingComponent;
        $this->commentRepo             = $comment;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
     }

    public function myEnquiries() 
    {
        $data   =   Enquiry::where("customer_id", Customer()->id)->get();
        return view('customers.pages.my-enquiries',compact('data',  $data )); 
    }

    public function myProjects() 
    {
        $data   =   Enquiry::where("customer_id", Customer()->id)->get();
        return view('customers.pages.my-projects',compact('data',  $data )); 
    }
    
    public function myEnquiriesEdit($id) 
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        $customer['document_types']     =   $this->documentTypeRepo->all();
        if (empty($enquiry)) {
            abort(403, 'Unauthorized action.');
        } else {
            return view('customers.pages.edit-enquiries',compact('enquiry','id','customer'));
        }
    }

    public function create()
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry(Customer()->id);
        Session::forget('enquiry_number');
        $customer['enquiry_date']       =   now();
        $customer['enquiry_number']     =   GlobalService::enquiryNumber();
        $customer['document_types']     =   $this->documentTypeRepo->all();
        return view('customers.pages.create-enquiries',compact('customer','enquiry'));
    }

    public function show() 
    {
        return view('customers.pages.enquiry-single-view');
    }

    public function getEnquiryNumber() 
    {
        if (Session::has('enquiry_number')){
            $enquiry_number = Session::get('enquiry_number');
            Log::info("Session already exists {$enquiry_number}");
        } else {
            Session::put('enquiry_number', GlobalService::enquiryNumber());
            GlobalService::updateConfig('ENQ');
            $enquiry_number = Session::get('enquiry_number');
            Log::info("New session created {$enquiry_number}");
        }
        return  $enquiry_number;
    }

    public function store(Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        $customer = $this->customerEnquiryRepo->getCustomer(Customer()->id);
        $enquiry_number = $this->getEnquiryNumber();
        $enquiry = $this->customerEnquiryRepo->getEnquiryByEnquiryNo($enquiry_number);
        if($type == 'project_info') {
            $array_merge = array_merge($data, ['enquiry_date' => Carbon::now()]);
            return $this->customerEnquiryRepo->createCustomerEnquiryProjectInfo($enquiry_number, $customer, $array_merge);
        } else if($type == 'services') {
            $services = $this->serviceRepo->find($data)->pluck('id');
            return $this->customerEnquiryRepo->createCustomerEnquiryServices($enquiry,$services);
        } else if($type == 'ifc_model_upload' || $type == 'ifc_model_upload_mandatory') {
            if($type == 'ifc_model_upload_mandatory') {
                $mandatoryDocuments =  $this->documentTypeRepo->getMandatoryField();
                $ficuploads = $enquiry->documentTypes()->get()->pluck('id')->toArray();
                $mandatoryDocs = $this->checkMandatoryFile($mandatoryDocuments , $ficuploads);
                if(!empty($mandatoryDocs)) {
                    return response(['status' => false, 'msg' => '', 'data' => $mandatoryDocs]);
                }
                return response(['status' => true, 'msg' => '', 'data' => '']);
            }
            $view_type =  $request->input('view_type');
            $path =  $request->file('file')->storePublicly('ifc_model_uploads', 'enquiry_uploads');
            $original_name = $request->file('file')->getClientOriginalName();
            $extension = $request->file('file')->getClientOriginalExtension();
            $documents =  $this->documentTypeRepo->findBySlug($view_type);
            $additionalData = ['date'=> now(), 'file_name' => $path, 'client_file_name' => $original_name, 'file_type' => $extension , 'status' => 'In progress'];
            $this->customerEnquiryRepo->createEnquiryDocuments($enquiry, $documents, $additionalData);
            return $enquiry->id;
        } else if ($type == 'building_component') {
            DB::beginTransaction();
            try {
                $dataObj = json_decode (json_encode ($data), FALSE);
                if(!empty($dataObj)) {
                    $response = $this->customerEnquiryRepo->storeBuildingComponent($enquiry ,$dataObj);
                    if($response) {
                        DB::commit();
                        return true;
                    }
                }
            } catch (Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        } else if($type == 'addtional_info') {
            $insert = ['comments' => $data, 'type' => 'enquiry', 'type_id' => $enquiry->id, 'created_by' => 1];
            $this->commentRepo->create($insert);
            $result = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
            return response($result);      
        }
    }


    public function checkMandatoryFile($mandatoryDocuments , $ficuploads) 
    {
        $mandatoryFile = [];
        foreach($mandatoryDocuments as $mandatoryDocument) {
            if(!in_array($mandatoryDocument->id, $ficuploads)) {
                $mandatoryFile[] = $mandatoryDocument->slug;
            }
        }
        return $mandatoryFile;
    }
    
    public function storeFiles(Request $req) {
        
      
    }

    public function getEnquiry($id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        $result['project_info'] = $this->formatProjectInfo($enquiry);
        $result['services'] =  $enquiry->services()->pluck('id');
        $result['building_component'] = $this->customerEnquiryRepo->getBuildingComponent($enquiry);
        return $result;
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

    public function edit($id) {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        $customer['document_types']     =   $this->documentTypeRepo->all();
        return view('customers.pages.edit-enquiries',compact('enquiry','id'));
    } 

    public function update($id, Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        $customer = $this->customerEnquiryRepo->getCustomer(Customer()->id);
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        if($type == 'project_info') {
            return $this->customerEnquiryRepo->updateEnquiry($id, $data);
        } else if($type == 'services') {
            $services = $this->serviceRepo->find($data)->pluck('id');
            return $this->customerEnquiryRepo->createCustomerEnquiryServices($enquiry,$services);
        }
    }

    public function getPlanViewList(Request $request)
    {
        $id = $request->input('id');
        $data = $this->customerEnquiryRepo->getPlanViewList($id);
        return response()->json( $data);
    }

    public function getFacaeViewList(Request $request)
    {
        $id = $request->input('id');
        $data = $this->customerEnquiryRepo->getFacaeViewList($id);
        return response()->json( $data);
    }

    public function getIFCViewList(Request $request) 
    {
        $id = $request->input('id');
        $data = $this->customerEnquiryRepo->getIFCViewList($id);
        return response()->json($data);
    }

    public function getViewList(Request $request) 
    {
        $id = $request->input('id');
        $view_type = $request->input('view_type');
        $documentType = $this->documentTypeRepo->findBySlug($view_type);
        $type_id = $documentType->id;
        $data = $this->customerEnquiryRepo->getViewList($id, $type_id);
        return response()->json($data);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $result = $this->customerEnquiryRepo->deleteDocumentEnquiry($id);
        if($result) {
            $data = ['msg'=> __('global.deleted'), 'status' => true];
        } else {
            $data = ['msg'=> __('global.something'),  'status' => false];
        }
        return response()->json($data);
    }

    public function getEnquiryReview()
    {
        $enquiry_number = $this->getEnquiryNumber();
        $enquiry = $this->customerEnquiryRepo->getEnquiryByEnquiryNo($enquiry_number);
        $result['project_infos'] = $this->formatProjectInfo($enquiry);
        $result['services'] =  $enquiry->services()->get();
        $result['building_components'] = $this->customerEnquiryRepo->getBuildingComponent( $enquiry);
        $result['ifc_model_uploads'] = $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry->id);
        $result['additional_infos'] = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
        return  $result;
    }

}
