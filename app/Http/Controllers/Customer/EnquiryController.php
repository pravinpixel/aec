<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Autodesk\AutodeskForgeController;
use App\Http\Controllers\Controller;
use App\Interfaces\BuildingComponentRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeRepositoryInterface;
use App\Interfaces\EnquiryCommentRepositoryInterface;
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
use App\Repositories\AutoDeskRepository;
use Exception;
use Illuminate\Support\Facades\Config as FacadesConfig;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;

class EnquiryController extends Controller
{
    protected $customerEnquiryRepo;
    protected $serviceRepo;
    protected $documentTypeRepo;
    protected $buildingComponent;
    protected $commentRepo;
    protected $documentTypeEnquiryRepo;
    protected $outputTypeRepository;
    protected $enquiryCommentsRepo;
    
    public function __construct(
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository,
        ServiceRepositoryInterface $serviceRepo,
        DocumentTypeRepositoryInterface $documentType,
        BuildingComponentRepositoryInterface $buildingComponent,
        CommentRepositoryInterface $comment,
        DocumentTypeEnquiryRepositoryInterface $documentTypeEnquiryRepo,
        OutputTypeRepositoryInterface $outputTypeRepository,
        EnquiryCommentRepositoryInterface $enquiryCommentsRepo
    ){
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
        $this->serviceRepo             = $serviceRepo;
        $this->documentTypeRepo        = $documentType;
        $this->buildingComponent       = $buildingComponent;
        $this->commentRepo             = $comment;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
        $this->outputTypeRepository    = $outputTypeRepository;
        $this->enquiryCommentsRepo     = $enquiryCommentsRepo;
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
    
    public function myEnquiriesEdit($id, $type = null) 
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        if($type == 'new'){
            $activeTab   = $this->getIncompletePanel($enquiry)[0] ??'';
            $activeCount = $this->getIncompletePanel($enquiry)[1] ??'';
        } else {
            $activeTab   = '';
            $activeCount = 0;
        }
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        $customer['document_types']     =   $this->documentTypeRepo->all();
        if (empty($enquiry)) {
            abort(403, 'Unauthorized action.');
        } else {
            return view('customer.enquiry.edit',compact('enquiry','id','customer','activeTab','activeCount'));
        }
    }
    

    public function create()
    {
        $customerEnquiryNumber = $this->getEnquiryNumber();
        $enquiry = $this->customerEnquiryRepo->getEnquiryByCustomerEnquiryNo($customerEnquiryNumber);
        if(!empty($enquiry)) {
            Session::forget('customer_enquiry_number');
            $this->getEnquiryNumber();
        }
        $customer['enquiry_date']            = now();
        $customer['customer_enquiry_number'] = GlobalService::customerEnquiryNumber();
        $customer['document_types']          = $this->documentTypeRepo->all();
        return view('customer.enquiry.create',compact('customer','enquiry','customerEnquiryNumber'));
    }

    public function show() 
    {
        return view('customers.pages.enquiry-single-view');
    }

    public function getEnquiryNumber() 
    {
        if (Session::has('customer_enquiry_number')){
            $customer_enquiry_number = Session::get('customer_enquiry_number');
            Log::info("Session already exists {$customer_enquiry_number}");
        } else {
            Session::put('customer_enquiry_number', GlobalService::customerEnquiryNumber());
            GlobalService::updateConfig('CENQ');
            $customer_enquiry_number = Session::get('customer_enquiry_number');
            Log::info("New session created {$customer_enquiry_number}");
        }
        return  $customer_enquiry_number;
    }

    public function getCurrentEnquiry(Request $request)
    {
        if (Session::has('customer_enquiry_number')){
            $customer_enquiry_number = Session::get('customer_enquiry_number');
            $enquiry = $this->customerEnquiryRepo->getEnquiryByCustomerEnquiryNo($customer_enquiry_number);
            return response(['status' => 'false',  'customer_enquiry_number'=>  $customer_enquiry_number, 'enquiry_id' => $enquiry->id ?? '']);
        }
        return response(['status' => 'false',  'customer_enquiry_number'=>  $this->getEnquiryNumber()]);
    }

    public function store(Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        $customer = $this->customerEnquiryRepo->getCustomer(Customer()->id);
        $customer_enquiry_number = $this->getEnquiryNumber();
        $enquiry = $this->customerEnquiryRepo->getEnquiryByCustomerEnquiryNo($customer_enquiry_number);
        if($type == 'project_info') {
            $array_merge = array_merge($data, ['enquiry_date' => Carbon::now(),'enquiry_number' => 'Draft']);
            $res = $this->customerEnquiryRepo->createCustomerEnquiryProjectInfo($customer_enquiry_number, $customer, $array_merge);
            $enquiry = $this->customerEnquiryRepo->getEnquiryByCustomerEnquiryNo($customer_enquiry_number);
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
                $this->StoreTechnicalEstimation($data, $enquiry);
                $this->StoreCostEstimation($data, $enquiry);
                $this->storeBuildingComponent($data, $enquiry);
              
              DB::commit();
            } catch (Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        } else if($type == 'building_component_upload') {
            $result = $this->storeBuildingComponentUpload($request, $enquiry);
            $buildingComponents = $this->buildingComponent->all();
            $this->customerEnquiryRepo->storeTechnicalEstimateCost($enquiry ,$buildingComponents);
            $this->customerEnquiryRepo->storeCostEstimation($enquiry ,$buildingComponents);
            $buildingComponentUploads = $this->customerEnquiryRepo->getBuildingComponent($enquiry);
            if($result) {
                return response(['status' => true, 'data' => $buildingComponentUploads, 'msg' => __('customer-enquiry.file_uploaded_successfully')]);
            }
            return response(['status' => false, 'msg' => __('global.something')]);
        } else if($type == 'additional_info') {
            $insert = ['comments' => $data, 'type' => 'enquiry', 'type_id' => $enquiry->id, 'created_by' => Customer()->id];
            $this->commentRepo->updateOrCreate($insert);
            $result = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
            $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'additional_info');
            return response($result);
        } else if($type == 'save_or_submit') {
            $status = $this->customerEnquiryRepo->updateStatusById($enquiry, $data);
            if($status == 'Active') {
                $this->customerEnquiryRepo->AddEnquiryReferenceNo($enquiry);
                Flash::success(__('global.enquiry_submitted'));
                return true;
            }
            Flash::success(__('global.enquiry_saved'));
            return true;
        }
    }

    public function StoreTechnicalEstimation($data, $enquiry) {
        $dataObj = json_decode (json_encode ($data), FALSE);
        if(!empty($dataObj)) {
            $response = $this->customerEnquiryRepo->storeTechnicalEstimateCost($enquiry ,$dataObj);
        }
    }

    public function StoreCostEstimation($data, $enquiry) {
        $dataObj = json_decode(json_encode ($data), FALSE);
        if(!empty($dataObj)) {
            $response = $this->customerEnquiryRepo->storeCostEstimation($enquiry ,$dataObj);
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
                $enquiry->building_component = true;
                $enquiry->building_component_process_type = 0;
                $enquiry->save();
                return true;
            }
        }
    }

    public function storeIfcUpload($request, $enquiry) 
    {
        $uploadPath         = GlobalService::getIfcmodelPath();
        $view_type          =   $request->input('view_type');
        $path               =   $request->file('file')->storePublicly($uploadPath, 'enquiry_uploads');
        $original_name      =   $request->file('file')->getClientOriginalName();
        $extension          =   $request->file('file')->getClientOriginalExtension();
        $documents          =   $this->documentTypeRepo->findBySlug($view_type);
        $additionalData     =   ['date'=> now(), 'file_name' => $path, 'client_file_name' => $original_name,'file_type' => $extension , 'status' => 'In progress'];
        $this->customerEnquiryRepo->createEnquiryDocuments($enquiry, $documents, $additionalData);
        $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'ifc_model_upload');
        $autoDesk = new  AutodeskForgeController(new  AutoDeskRepository);
        $autoDesk->uploadfile($path, $enquiry, $request);
        return $enquiry->id;
    }

    public function storeBuildingComponentUpload($request, $enquiry) 
    {
        $uploadPath = GlobalService::getBuildingComponentPath();
        $path               =   $request->file('file')->storePublicly($uploadPath, 'enquiry_uploads');
        $original_name      =   $request->file('file')->getClientOriginalName();
        $extension          =   $request->file('file')->getClientOriginalExtension();
        $storeData     =   ['file_path' => $path,  
                                'file_name' => $original_name,
                                'file_type' => $extension,  
                                'enquiry_id' => $enquiry->id, 
                                'customer_id' => Customer()->id];
        $this->customerEnquiryRepo->createEnquiryBuildingComponentDocument($storeData);
        $enquiry->building_component = true;
        $enquiry->building_component_process_type = 1; // for upload
        $enquiry->save();
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
                $this->StoreTechnicalEstimation($data, $enquiry);
                $this->StoreCostEstimation($data, $enquiry);

                DB::commit();
            } catch (Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        } else if($type == 'building_component_upload') {
            $result = $this->storeBuildingComponentUpload($request, $enquiry);
            $buildingComponents = $this->buildingComponent->all();
            $this->customerEnquiryRepo->storeTechnicalEstimateCost($enquiry ,$buildingComponents);
            $this->customerEnquiryRepo->storeCostEstimation($enquiry ,$buildingComponents);
            $buildingComponentUploads = $this->customerEnquiryRepo->getBuildingComponent($enquiry);
            if($result) {
                return response(['status' => true, 'data' => $buildingComponentUploads,'msg' => __('customer-enquiry.file_uploaded_successfully')]);
            }
            return response(['status' => false, 'msg' => __('global.something')]);
        } else if($type == 'additional_info') {
            $insert = ['comments' => $data, 'type' => 'enquiry', 'type_id' => $enquiry->id, 'created_by' => Customer()->id];
            $this->commentRepo->updateOrCreate($insert);
            $result = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
            $this->customerEnquiryRepo->updateWizardStatus($enquiry, 'additional_info');
            return response($result);
        } else if($type == 'save_or_submit') {
            $status = $this->customerEnquiryRepo->updateStatusById($enquiry, $data);
            if($status == 'Active') {
                $this->customerEnquiryRepo->AddEnquiryReferenceNo($enquiry);
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
            $result['building_component_process_type'] = $enquiry->building_component_process_type;
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
            'customer_enquiry_number'=> $enquiry->customer_enquiry_number,
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
            'building_component_process_type' => $enquiry->building_component_process_type,
            'status'               => $enquiry->status,
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

    public function delete($id)
    {
        $this->customerEnquiryRepo->delete($id);
        Flash::success(__('global.deleted'));
        return redirect()->route('customers-my-enquiries');
    }

    public function deleteDocument(Request $request)
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

    public function deleteBuildingComponentDocument(Request $request)
    {
        $id = $request->input('id');
        $result = $this->customerEnquiryRepo->deleteAndGetBuildingComponentDocument($id);
        if($result) {
            $data = ['msg'=> __('global.deleted'), 'data' => $result, 'status' => true];
        } else {
            $data = ['msg'=> __('global.something'), 'data' => $result, 'status' => false];
        }
        return response()->json($data);
    }

    public function getEnquiryReview()
    {
        $customer_enquiry_number = $this->getEnquiryNumber();
        $enquiry = $this->customerEnquiryRepo->getEnquiryByCustomerEnquiryNo($customer_enquiry_number);
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
        $result['building_components'] = $this->customerEnquiryRepo->getBuildingComponent($enquiry);
        $result['ifc_model_uploads'] = $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry->id);
        $result['additional_infos'] = $this->commentRepo->getCommentByEnquiryId($enquiry->id);
        $result["enquiry_comments"] = $this->enquiryCommentsRepo->getCommentsCountByType($id)->pluck('comments_count', 'type');
        $result["enquiry_active_comments"] = $this->enquiryCommentsRepo->getActiveCommentsCountByType($id)->pluck('comments_count', 'type');
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

    public function destroy($id)
    {

    }

    public function getNewEnquiries(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiry_number = isset($request->enquiry_number) ? $request->enquiry_number : false;
            $projetType = isset($request->project_type) ? $request->project_type : false;
            $dataDb = Enquiry::with(['projectType', 'comments'=> function($q){
                            $q->where(['status' => 0, 'created_by' => 'Admin']);
                        }])
                        ->whereBetween('enquiry_date', [$fromDate, $toDate])
                        ->when( $enquiry_number, function($q) use($enquiry_number){
                            $q->where('enquiry_number', $enquiry_number);
                        })
                        ->when($projetType, function($q) use($projetType){
                            $q->where('project_type_id', $projetType);
                        })
                        ->where(['status' => 'In-Complete', 'customer_id' => Customer()->id]);
            return DataTables::eloquent($dataDb)
            ->editColumn('enquiry_number', function($dataDb){
                $commentCount = $dataDb->comments->count();
                $enquiryComments = $commentCount == 0 ? '' : $commentCount;
                return '<button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary"  ng-click=getEnquiry("project_info",'. $dataDb->id .')> 
                    <b>'. $dataDb->enquiry_number .'</b>
                    <span class="badge badge-primary-lighten btn btn-sm btn-light border shadow-sm" >'.$enquiryComments.' </span> 
                </button>';
            })
            ->addColumn('projectType', function($dataDb){
                return $dataDb->projectType->project_type_name ?? '';
            })
            ->editColumn('status', function($dataDb){
                return '<small class="px-1 bg-warning text-white rounded-pill text-center">'.$dataDb->status.'</small>';
            })
            ->editColumn('enquiry_date', function($dataDb) {
                $format = FacadesConfig::get('global.model_date_format');
                return Carbon::parse($dataDb->enquiry_date)->format($format);
            })
            ->addColumn('pipeline', function($dataDb){
                return '<div class="btn-group">
                <button ng-click=getEnquiry("project_info",'.$dataDb->id.') class="btn progress-btn '.($dataDb->project_info == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Information"></button> 
                <button ng-click=getEnquiry("service",'.$dataDb->id.') class="btn progress-btn '.($dataDb->service == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Services"></button> 
                <button ng-click=getEnquiry("ifc_model",'.$dataDb->id.') class="btn progress-btn '.($dataDb->ifc_model_upload == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="IFC Model and Uploads"></button> 
                <button ng-click=getEnquiry("building_component",'.$dataDb->id.') class="btn progress-btn '.($dataDb->building_component == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Building Component"></button> 
                <button ng-click=getEnquiry("additional_info",'.$dataDb->id.') class="btn progress-btn '.($dataDb->additional_info == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Additional Information"></button> 
                </div>';
            })
            ->addColumn('action', function($dataDb){
                return '
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route("customers.edit-enquiry",[$dataDb->id,'new']) .'">View</a>
                                <a class="dropdown-item" href="'.route("customers.delete-enquiry",$dataDb->id) .'">Delete</a>
                            </div>
                        </div>
                    ';
            })
            ->rawColumns(['action', 'pipeline','enquiry_number','status'])
            ->make(true);
        }
    }


    public function getActiveEnquiries(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;
            $projetType = isset($request->projet_type) ? $request->projet_type : false;
            $dataDb = Enquiry::with(['projectType', 'comments'=> function($q){
                                $q->where(['status' => 0, 'created_by' => 'Admin']);
                            }])
                            ->whereBetween('enquiry_date', [$fromDate, $toDate])
                            ->when( $enquiryNumber, function($q) use($enquiryNumber){
                                $q->where('enquiry_number', $enquiryNumber);
                            })
                            ->when($projetType, function($q) use($projetType){
                                $q->where('project_type_id', $projetType);
                            })
                            ->where(['status' => 'Active' , 'customer_id' => Customer()->id]);
                            
            return DataTables::eloquent($dataDb)
            ->editColumn('enquiry_number', function($dataDb){
                $commentCount = $dataDb->comments->count();
                $enquiryComments = $commentCount == 0 ? '' : $commentCount;
                return '<button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary"  ng-click=getEnquiry("project_info",'. $dataDb->id .')> 
                    <b>'. $dataDb->enquiry_number .'</b>
                    <span class="badge badge-primary-lighten btn btn-sm btn-light border shadow-sm" >'.$enquiryComments.' </span> 
                </button>';
            })
            ->addColumn('projectType', function($dataDb){
                return $dataDb->projectType->project_type_name ?? '';
            })
            ->editColumn('status', function($dataDb){
                return '<small class="px-1 bg-success text-white rounded-pill text-center">'.$dataDb->status.'</small>';
            })
    
            ->editColumn('enquiry_date', function($dataDb) {
                $format = FacadesConfig::get('global.model_date_format');
                return Carbon::parse($dataDb->enquiry_date)->format($format);
            })
            ->addColumn('pipeline', function($dataDb){
                return '<div class="btn-group">
                <button ng-click=getEnquiry("project_info",'.$dataDb->id.') class="btn progress-btn '.($dataDb->project_info == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Information"></button> 
                <button ng-click=getEnquiry("service",'.$dataDb->id.') class="btn progress-btn '.($dataDb->service == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Services"></button> 
                <button ng-click=getEnquiry("ifc_model",'.$dataDb->id.') class="btn progress-btn '.($dataDb->ifc_model_upload == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="IFC Model and Uploads"></button> 
                <button ng-click=getEnquiry("building_component",'.$dataDb->id.') class="btn progress-btn '.($dataDb->building_component == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Building Component"></button> 
                <button ng-click=getEnquiry("additional_info",'.$dataDb->id.') class="btn progress-btn '.($dataDb->additional_info == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Additional Information"></button>
                </div>';
            })
            ->addColumn('action', function($dataDb){
                return '
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route("customers.edit-enquiry",[$dataDb->id,'active']) .'">View</a>
                                <a class="dropdown-item" href="#">Approve</a>
                                <a class="dropdown-item" href="'.route('customers.move-to-cancel',[$dataDb->id]).'">Cancel Enquiry</a>
                            </div>
                        </div>
                    ';
            })
            ->rawColumns(['action', 'pipeline','enquiry_number','status'])
            ->make(true);
        }
    }

    public function getClosedEnquiries(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;
            $projetType = isset($request->projet_type) ? $request->projet_type : false;

            $dataDb = Enquiry::with(['projectType', 'comments'=> function($q){
                                $q->where(['status' => 0, 'created_by' => 'Admin']);
                            }])
                            ->whereBetween('enquiry_date', [$fromDate, $toDate])
                            ->when($enquiryNumber, function($q) use($enquiryNumber){
                                $q->where('enquiry_number', $enquiryNumber);
                            })
                            ->when($projetType, function($q) use($projetType){
                                $q->where('project_type_id', $projetType);
                            })
                            ->where(['status'=>'Closed' , 'customer_id' => Customer()->id]);
            return DataTables::eloquent($dataDb)
            ->editColumn('enquiry_number', function($dataDb){
                $commentCount = $dataDb->comments->count();
                $enquiryComments = $commentCount == 0 ? '' : $commentCount;
                return '<button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary"  ng-click=getEnquiry("project_info",'. $dataDb->id .')> 
                    <b>'. $dataDb->enquiry_number .'</b>
                    <span class="badge badge-primary-lighten btn btn-sm btn-light border shadow-sm" >'.$enquiryComments.' </span> 
                </button>';
            })
            ->addColumn('projectType', function($dataDb){
                return $dataDb->projectType->project_type_name ?? '';
            })
            ->editColumn('status', function($dataDb){
                return '<small class="px-1 bg-danger text-white rounded-pill text-center">'.$dataDb->status.'</small>';
            })
    
            ->editColumn('enquiry_date', function($dataDb) {
                $format = FacadesConfig::get('global.model_date_format');
                return Carbon::parse($dataDb->enquiry_date)->format($format);
            })
            ->addColumn('pipeline', function($dataDb){
                return '<div class="btn-group">
                <button ng-click=getEnquiry("project_info",'.$dataDb->id.') class="btn progress-btn '.($dataDb->project_info == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Information"></button> 
                <button ng-click=getEnquiry("service",'.$dataDb->id.') class="btn progress-btn '.($dataDb->service == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Services"></button> 
                <button ng-click=getEnquiry("ifc_model",'.$dataDb->id.') class="btn progress-btn '.($dataDb->ifc_model_upload == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="IFC Model and Uploads"></button> 
                <button ng-click=getEnquiry("building_component",'.$dataDb->id.') class="btn progress-btn '.($dataDb->building_component == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Building Component"></button>
                <button ng-click=getEnquiry("additional_info",'.$dataDb->id.') class="btn progress-btn '.($dataDb->additional_info == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Additional Information"></button> 
                </div>';
            })
            ->addColumn('action', function($dataDb){
                return '
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Active</a>
                            </div>
                        </div>
                    ';
            })
            ->rawColumns(['action', 'pipeline','enquiry_number','status'])
            ->make(true);
        }
    }

    public function moveToCancel($id)
    {
        $status = $this->customerEnquiryRepo->moveToCancel($id);
        if($status) {
            Flash::success(__('enquiry.enquiry_move_to_cancel'));
            return redirect(route('customers-my-enquiries'));
        }
        Flash::error(__('global.something'));
        return redirect(route('customers-my-enquiries'));
    }
}
