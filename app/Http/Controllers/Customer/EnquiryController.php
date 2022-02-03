<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Interfaces\BuildingComponentRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeRepositoryInterface;
use App\Interfaces\OutputTypeRepositoryInterface;
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
use Laracasts\Flash\Flash;

class EnquiryController extends Controller
{
 
    protected $customerEnquiryRepo;
    protected $serviceRepo;
    protected $documentTypeRepo;
    protected $buildingComponent;
    protected $commentRepo;
    protected $documentTypeEnquiryRepo;
    protected $outputTypeRepository;

    public function __construct(
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository,
        ServiceRepositoryInterface $serviceRepo,
        DocumentTypeRepositoryInterface $documentType,
        BuildingComponentRepositoryInterface $buildingComponent,
        CommentRepositoryInterface $comment,
        DocumentTypeEnquiryRepositoryInterface $documentTypeEnquiryRepo,
        OutputTypeRepositoryInterface $outputTypeRepository
    ){
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
        $this->serviceRepo             = $serviceRepo;
        $this->documentTypeRepo        = $documentType;
        $this->buildingComponent       = $buildingComponent;
        $this->commentRepo             = $comment;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
        $this->outputTypeRepository    = $outputTypeRepository;
     }

    public function myEnquiries() 
    {
        $data['new_enquiries']   =   Enquiry::where(["customer_id"=> Customer()->id, 'status' => 'In-Complete'])->get();
        $data['active_enquiries']   =   Enquiry::where(["customer_id"=> Customer()->id, 'status' => 'Active'])->get();
        $data['complete_enquiries']   =   Enquiry::where(["customer_id"=> Customer()->id, 'status' => 'Completed'])->get();
        return view('customer.enquiry.index',compact('data',  $data )); 
    }

    public function myProjects() 
    {
        $data   =   Enquiry::where("customer_id", Customer()->id)->get();
        return view('customer.pages.my-projects',compact('data',  $data )); 
    }
    
    public function myEnquiriesEdit($id) 
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        $activeTab     =   $this->getIncompletePanel($enquiry)[0] ??'';
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        $customer['document_types']     =   $this->documentTypeRepo->all();
        $activeTab     =   $this->getIncompletePanel($enquiry)[0] ??'';
        $activeCount     =   $this->getIncompletePanel($enquiry)[1] ??'';
        if (empty($enquiry)) {
            abort(403, 'Unauthorized action.');
        } else {
            return view('customer.enquiry.edit',compact('enquiry','id','customer','activeTab','activeCount'));
        }
    }

    public function create()
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry(Customer()->id);
        $enquiry_number = $this->getEnquiryNumber();
        $enquiry = $this->customerEnquiryRepo->getEnquiryByEnquiryNo($enquiry_number);
        if(!empty($enquiry)) {
            Session::forget('enquiry_number');
            $this->getEnquiryNumber();
        }
        $customer['enquiry_date']       =   now();
        $customer['enquiry_number']     =   GlobalService::enquiryNumber();
        $customer['document_types']     =   $this->documentTypeRepo->all();
        return view('customer.enquiry.create',compact('customer','enquiry'));
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

    public function getCurrentEnquiry(Request $request)
    {
        if (Session::has('enquiry_number')){
            $enquiry_number = Session::get('enquiry_number');
            $enquiry = $this->customerEnquiryRepo->getEnquiryByEnquiryNo($enquiry_number);
            return response(['status' => 'false',  'enquiry_number'=>  $enquiry_number, 'enquiry_id' => $enquiry->id ?? '']);
        }
        return response(['status' => 'false',  'enquiry_number'=>  $this->getEnquiryNumber()]);
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
            $res = $this->customerEnquiryRepo->createCustomerEnquiryProjectInfo($enquiry_number, $customer, $array_merge);
            $enquiry = $this->customerEnquiryRepo->getEnquiryByEnquiryNo($enquiry_number);
            $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'project_info');
            return $res;
        } else if($type == 'services') {
            $services = $this->serviceRepo->find($data)->pluck('id');
            $res = $this->customerEnquiryRepo->createCustomerEnquiryServices($enquiry,$services);
            $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'service');
            return $res;
        } else if($type == 'ifc_model_upload' || $type == 'ifc_model_upload_mandatory' || $type == "ifc_link") {
            if($type == 'ifc_model_upload_mandatory') {
                $mandatoryDocuments =  $this->documentTypeRepo->getMandatoryField();
                $ifcUploads         = $enquiry->documentTypes()->get()->pluck('id')->toArray();
                $mandatoryDocs      = $this->checkMandatoryFile($mandatoryDocuments , $ifcUploads);
                if(!empty($mandatoryDocs)) {
                    return response(['status' => false, 'msg' => '', 'data' => $mandatoryDocs]);
                }
                return response(['status' => true, 'msg' => '', 'data' => '']);
            } else  if($type == "ifc_link") {
                return $this->storeIfcLink($request, $enquiry);
            }
            return $this->storeIfcUpload($request, $enquiry);
        } else if ($type == 'building_component') {
            DB::beginTransaction();
            try {
                $this->Storecostestimate($data, $enquiry);
                $this->storeBuildingComponent($data, $enquiry);
              
              DB::commit();
            } catch (Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        } else if($type == 'additional_info') {
            $insert = ['comments' => $data, 'type' => 'enquiry', 'type_id' => $enquiry->id, 'created_by' => Customer()->id];
            $this->commentRepo->updateOrCreate($insert);
            $result = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
            $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'additional_info');
            return response($result);
        } else if($type == 'save_or_submit') {
            $status = $this->customerEnquiryRepo->updateStatusById($enquiry, $data);
            if($status == 'active') {
                Flash::success(__('global.enquiry_submitted'));
                return true;
            }
            Flash::success(__('global.enquiry_saved'));
            return true;
        }
    }
    public function Storecostestimate($data, $enquiry) {
    //    dd($data);
        //    EnquiryTechnicalEstimate
        $dataObj = json_decode (json_encode ($data), FALSE);
        if(!empty($dataObj)) {
            $response = $this->customerEnquiryRepo->storeTechnicalEstimateCost($enquiry ,$dataObj);
        }
    }

    public function storeIfcLink($request, $enquiry)
    {
        $view_type =  $request->input('view_type');
        $link =  $request->input('link');
        $documents =  $this->documentTypeRepo->findBySlug($view_type);
        $additionalData = ['date'=> now(), 'file_name' => $link, 'client_file_name' => $link, 'file_type' => 'link' , 'status' => 'In progress'];
        $this->customerEnquiryRepo->createEnquiryDocuments($enquiry, $documents, $additionalData);
          $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'ifc_model_upload');
        return $enquiry->id;
    }

    public function storeBuildingComponent($data, $enquiry) 
    {
        $dataObj = json_decode (json_encode ($data), FALSE);
        if(!empty($dataObj)) {
            $response = $this->customerEnquiryRepo->storeBuildingComponent($enquiry ,$dataObj);
            if($response) {
               
                $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'building_component');
                return true;
            }
        }
    }

    public function storeIfcUpload($request, $enquiry) 
    {
        $view_type          =   $request->input('view_type');
        $path               =   $request->file('file')->storePublicly('ifc_model_uploads', 'enquiry_uploads');
        $original_name      =   $request->file('file')->getClientOriginalName();
        $extension          =   $request->file('file')->getClientOriginalExtension();
        $documents          =   $this->documentTypeRepo->findBySlug($view_type);
        $additionalData     =   ['date'=> now(), 'file_name' => $path, 'client_file_name' => $original_name,'file_type' => $extension , 'status' => 'In progress'];
        $this->customerEnquiryRepo->createEnquiryDocuments($enquiry, $documents, $additionalData);
        $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'ifc_model_upload');
        return $enquiry->id;
    }

    public function update($id, Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        $customer = $this->customerEnquiryRepo->getCustomer(Customer()->id);
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        if($type == 'project_info') {
            $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'project_info');
            return $this->customerEnquiryRepo->updateEnquiry($id, $data);
        } else if($type == 'services') {
            $services = $this->serviceRepo->find($data)->pluck('id');
            $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'service');
            return $this->customerEnquiryRepo->createCustomerEnquiryServices($enquiry,$services);
        } else if($type == 'ifc_model_upload' || $type == 'ifc_model_upload_mandatory' || $type == "ifc_link") {
            if($type == 'ifc_model_upload_mandatory') {
                $mandatoryDocuments =  $this->documentTypeRepo->getMandatoryField();
                $ifcUploads = $enquiry->documentTypes()->get()->pluck('id')->toArray();
                $mandatoryDocs = $this->checkMandatoryFile($mandatoryDocuments , $ifcUploads);
                if(!empty($mandatoryDocs)) {
                    return response(['status' => false, 'msg' => '', 'data' => $mandatoryDocs]);
                }
                return response(['status' => true, 'msg' => '', 'data' => '']);
            } else  if($type == "ifc_link") {
                return $this->storeIfcLink($request, $enquiry);
            }
            return $this->storeIfcUpload($request, $enquiry);
           
        } else if($type == 'building_component') {
            DB::beginTransaction();
            try {
                
                $this->storeBuildingComponent($data, $enquiry);
                $this->Storecostestimate($data, $enquiry);
                DB::commit();
            } catch (Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        } else if($type == 'additional_info') {
            $insert = ['comments' => $data, 'type' => 'enquiry', 'type_id' => $enquiry->id, 'created_by' => 1];
            $this->commentRepo->updateOrCreate($insert);
            $result = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
            return response($result);
        } else if($type == 'save_or_submit') {
            $status = $this->customerEnquiryRepo->updateStatusById($enquiry, $data);
            if($status == 'Active') {
                Flash::success(__('global.enquiry_submitted'));
                return true;
            }
            Flash::success(__('global.enquiry_saved'));
            return true;
        }
    }


    public function checkMandatoryFile($mandatoryDocuments , $ifcUploads) 
    {
        $mandatoryFile = [];
        foreach($mandatoryDocuments as $mandatoryDocument) {
            if(!in_array($mandatoryDocument->id, $ifcUploads)) {
                $mandatoryFile[] = $mandatoryDocument->slug;
            }
        }
        return $mandatoryFile;
    }
    
    public function storeFiles(Request $req) {
        
      
    }

    public function getEnquiry($id, $type = null)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        if($type == 'project_info') {
            $result['project_info'] = $this->formatProjectInfo($enquiry);
        } else if($type == 'services') {
            $result['services'] =  $enquiry->services()->pluck('id');
        } else if($type == 'ifc_model_uploads') {
            $result['ifc_model_uploads'] = $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry->id);
        }  else if($type == 'building_component') {
            $result['building_component'] = $this->customerEnquiryRepo->getBuildingComponent($enquiry);
        } else if($type == 'additional_info') {
            $result['additional_infos'] = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
        }
        return $result;
    }


    public function formatProjectInfo($enquiry) 
    {
        return [
            'enquiry_id'           => $enquiry->id,
            'enquiry_no'           => $enquiry->enquiry_number,
            'enquiry_date'         => $enquiry->enquiry_date,
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
        return view('customer.enquiry.edit',compact('enquiry','id'));
    }


    public function getIncompletePanel($enquiry)
    {
        if($enquiry->project_info == 0) {
            return ['', 0];
        } else if($enquiry->service == 0) {
            return ['service',1];
        } else if($enquiry->ifc_model_upload == 0) {
            return ['ifc-model-upload',2];
        } else if($enquiry->building_component == 0) {
            return ['building-component',3];
        } else if($enquiry->additional_info == 0) {
            return ['additional-info',4];
        } else {
            return ['review',5];
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
        $id     = $request->input('id');
        $data   = $this->customerEnquiryRepo->getFacaeViewList($id);
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

    public function getEditEnquiryReview($id) 
    {
        $outputTypes =  $this->outputTypeRepository->get();
        $enquiry = $this->customerEnquiryRepo->getEnquiryById($id);
        $services = $enquiry->services()->get();
        $result['project_infos'] = $this->formatProjectInfo($enquiry);
        $result['services'] =  $this->formatServices($outputTypes, $services);
        $result['building_components'] = $this->customerEnquiryRepo->getBuildingComponent( $enquiry);
        $result['ifc_model_uploads'] = $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry->id);
        $result['additional_infos'] = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
        return  $result;
    }

    public function formatServices($outputTypes, $services)
    {
        $result = [];
        foreach($outputTypes as $outputType) {
            foreach($services as $service) {
                if($service->output_type_id == $outputType->id){
                    $result[$outputType->output_type_name][] = $service;
                }
            }
        }
        return $result;
    }

}
