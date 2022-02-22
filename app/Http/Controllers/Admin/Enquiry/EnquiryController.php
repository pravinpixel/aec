<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Customer;
use App\Models\Enquiry;
use App\Services\GlobalService;
use App\Interfaces\BuildingComponentRepositoryInterface;
use App\Interfaces\OutputTypeRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
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
    

    protected $user;

    public function __construct(
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository,
        ServiceRepositoryInterface $serviceRepo,
        DocumentTypeRepositoryInterface $documentType,
        BuildingComponentRepositoryInterface $buildingComponent,
        CommentRepositoryInterface $comment,
        DocumentTypeEnquiryRepositoryInterface $documentTypeEnquiryRepo,
        CustomerRepositoryInterface $customerRepository,
        OutputTypeRepositoryInterface $outputTypeRepository
    ){
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
        $this->serviceRepo             = $serviceRepo;
        $this->documentTypeRepo        = $documentType;
        $this->buildingComponent       = $buildingComponent;
        $this->commentRepo             = $comment;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
        $this->customer = $customerRepository;
        $this->outputTypeRepository    = $outputTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {

        if ($req->all()) {

            $req_from   =   isset($req->from_date) ?  $req->from_date : Carbon::now()->subDays(6);
            $from       =   Carbon::parse($req_from)->startOfDay();
            $req_to     =   isset($req->to_date) ?  $req->to_date : Carbon::now();
            $to         =   Carbon::parse($req_to)->startOfDay();
            $status     =   $req->status;
            $type       =   $req->type;
            
            $data       =   Enquiry::whereBetween('created_at', [$from, $to])
                                        ->where('status','Active')
                                        ->when($type,  function($q) use($type) {
                                            $q->where('type', $type);
                                        })
                                    ->latest()
                                    ->get();
            return $data;
        }  
        
        return Enquiry::with('customer')   
                        ->where('status','Active')                     
                        ->join("customers", "customers.id", "=" ,"enquiries.customer_id")
                        ->select("enquiries.*")
                        ->get();
        
    }

    public function getUnattendedEnquiries(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate =  now()->subDays(config('global.date_period'));
            $toDate =  now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;
            $projetType = isset($request->projet_type) ? $request->projet_type : false;
            $dataDb = Enquiry::with(['projectType', 'customer'])
                            ->where(['status' => 'Active' , 'project_status' => 'Unattended'])
                            ->orWhere('created_by', Admin()->id)
                            ->whereBetween('enquiry_date', [$fromDate, $toDate])
                            ->when( $enquiryNumber, function($q) use($enquiryNumber){
                                $q->where('enquiry_number', $enquiryNumber);
                            })
                            ->when($projetType, function($q) use($projetType){
                                $q->where('project_type_id', $projetType);
                            });
                            
            return DataTables::eloquent($dataDb)
            ->editColumn('enquiry_number', function($dataDb){
                return '
                    <button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary" ng-click=toggle("edit",'.$dataDb->id.')>
                        <b>'. $dataDb->enquiry_number.'</b>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> 5 </span>
                    </button>
                ';
            })
            ->addColumn('projectType', function($dataDb){
                return $dataDb->projectType->project_type_name ?? '';
            })
            ->editColumn('project_status', function($dataDb){
                return '<small class="px-1 bg-danger text-white rounded-pill text-center">'.$dataDb->project_status.'</small>';
            })
    
            ->editColumn('enquiry_date', function($dataDb) {
                $format = config('global.model_date_format');
                return Carbon::parse($dataDb->enquiry_date)->format($format);
            })
            ->addColumn('pipeline', function($dataDb){
                return '<div class="btn-group" ng-click=toggle("edit",'.$dataDb->id.')>
                    <button  class="btn progress-btn '.($dataDb->status == 'Active' ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Information"></button> 
                    <button  class="btn progress-btn '.($dataDb->technical_estimation_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Services"></button> 
                    <button  class="btn progress-btn '.($dataDb->cost_estimation_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="IFC Model and Uploads"></button> 
                    <button  class="btn progress-btn '.($dataDb->proposal_sharing_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Building Component"></button> 
                    <button  class="btn progress-btn '.($dataDb->customer_response == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Additional Information"></button>
                </div>';
            })
            ->addColumn('action', function($dataDb){
                return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route('view-enquiry', $dataDb->id).'">View</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['action', 'pipeline','enquiry_number','project_status'])
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
            $dataDb = Enquiry::with(['projectType', 'customer'])
                            ->where(['status' => 'Active' , 'project_status' => 'Active'])
                            ->whereBetween('enquiry_date', [$fromDate, $toDate])
                            ->when( $enquiryNumber, function($q) use($enquiryNumber){
                                $q->where('enquiry_number', $enquiryNumber);
                            })
                            ->when($projetType, function($q) use($projetType){
                                $q->where('project_type_id', $projetType);
                            });
                            
            return DataTables::eloquent($dataDb)
            ->editColumn('enquiry_number', function($dataDb){
                return '<div ng-click=toggle("edit",'.$dataDb->id.')> <span class="badge badge-primary-lighten btn p-2" >'. $dataDb->enquiry_number.' </span> </div>';
            })
            ->addColumn('projectType', function($dataDb){
                return $dataDb->projectType->project_type_name ?? '';
            })
            ->editColumn('project_status', function($dataDb){
                return '<small class="px-1 bg-success text-white rounded-pill text-center">'.$dataDb->project_status.'</small>';
            })
    
            ->editColumn('enquiry_date', function($dataDb) {
                $format = config('global.model_date_format');
                return Carbon::parse($dataDb->enquiry_date)->format($format);
            })
            ->addColumn('pipeline', function($dataDb){
                return '<div class="btn-group" ng-click=toggle("edit",'.$dataDb->id.')>
                <button  class="btn progress-btn '.($dataDb->status == 'Active' ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Information"></button> 
                <button  class="btn progress-btn '.($dataDb->technical_estimation_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Services"></button> 
                <button  class="btn progress-btn '.($dataDb->cost_estimation_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="IFC Model and Uploads"></button> 
                <button  class="btn progress-btn '.($dataDb->proposal_sharing_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Building Component"></button> 
                <button  class="btn progress-btn '.($dataDb->customer_response == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Additional Information"></button>
                </div>';
            })
            ->addColumn('action', function($dataDb){
                return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route('view-enquiry', $dataDb->id).'">View</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['action', 'pipeline','enquiry_number','project_status'])
            ->make(true);
        }
    }

    public function getCancelledEnquiries(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;
            $projetType = isset($request->projet_type) ? $request->projet_type : false;
            $dataDb = Enquiry::with(['projectType', 'customer'])
                            ->where(['status' => 'Active' , 'project_status' => 'Cancelled'])
                            ->whereBetween('enquiry_date', [$fromDate, $toDate])
                            ->when( $enquiryNumber, function($q) use($enquiryNumber){
                                $q->where('enquiry_number', $enquiryNumber);
                            })
                            ->when($projetType, function($q) use($projetType){
                                $q->where('project_type_id', $projetType);
                            });
                         
            return DataTables::eloquent($dataDb)
            ->editColumn('enquiry_number', function($dataDb){
                return '<div ng-click=toggle("edit",'.$dataDb->id.')> <span class="badge badge-primary-lighten btn p-2" >'. $dataDb->enquiry_number.' </span> </div>';
            })
            ->addColumn('projectType', function($dataDb){
                return $dataDb->projectType->project_type_name ?? '';
            })
            ->editColumn('project_status', function($dataDb){
                return '<small class="px-1 bg-danger text-white rounded-pill text-center">'.$dataDb->project_status.'</small>';
            })
    
            ->editColumn('enquiry_date', function($dataDb) {
                $format = config('global.model_date_format');
                return Carbon::parse($dataDb->enquiry_date)->format($format);
            })
            ->addColumn('pipeline', function($dataDb){
                return '<div class="btn-group" ng-click=toggle("edit",'.$dataDb->id.')>
                <button  class="btn progress-btn '.($dataDb->status == 'Active' ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Information"></button> 
                <button  class="btn progress-btn '.($dataDb->technical_estimation_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Services"></button> 
                <button  class="btn progress-btn '.($dataDb->cost_estimation_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="IFC Model and Uploads"></button> 
                <button  class="btn progress-btn '.($dataDb->proposal_sharing_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Building Component"></button> 
                <button  class="btn progress-btn '.($dataDb->customer_response == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Additional Information"></button>
                </div>';
            })
            ->addColumn('action', function($dataDb){
                return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route('view-enquiry', $dataDb->id).'">View</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['action', 'pipeline','enquiry_number','project_status'])
            ->make(true);
        }
    }

    public function singleIndex($id) {
        
        $enquiry                        =   $this->customerEnquiryRepo->getEnquiryByID($id);
        $outputTypes                    =   $this->outputTypeRepository->get();
        $services                       =   $enquiry->services()->get();

        $result['progress']             =   $enquiry; 
        $result['customer_info']        =   $enquiry->customer; 
        $result["enquiry_number"]       =   $enquiry->enquiry_number;
        $result["customer_enquiry_number"] =   $enquiry->customer_enquiry_number;
        $result["enquiry_comments"]     =   $this->customerEnquiryRepo->getEnquiryComments($id);
        $result["enquiry_id"]           =   $enquiry->id;
        $result["enquiry_status"]       =   $enquiry->customer_response;
        $result["enquiry"]              =   $this->customerEnquiryRepo->formatEnqInfo($enquiry);
        $result['project_info']         =   $this->customerEnquiryRepo->formatProjectInfo($enquiry);
        $result['services']             =   $this->formatServices($outputTypes, $services);
        $result['ifc_model_uploads']    =   $enquiry->documentTypes; 
        $result['building_component']   =   $this->customerEnquiryRepo->getBuildingComponent($enquiry);
        $result['additional_infos']     =   $this->commentRepo->getCommentByEnquiryId($enquiry->id);
        return $result;
        
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
    public function singleIndexPage($id=null) {
        if ($id) {
            
            $data   =   Enquiry::with('customer')->find($id);
            return view('admin.enquiry.show',compact('data',  $data ));   
        }else {
            return redirect()->route('admin.enquiry-list');
        }
    }

    public function getEnquiryNumber(Request $request)    { 
        return  GlobalService::customerEnquiryNumber();  
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
         
        DB::beginTransaction();
        try {
            $latest_enquiry_number = GlobalService::customerEnquiryNumber();
            $enquiry_number = GlobalService::EnquiryNumber();
            if($request->enquiry_number != $latest_enquiry_number) {
                return response(['status' => false, 'data' => '' ,'msg' => trans('enquiry.number_mismatch')], Response::HTTP_OK);
            }
            $email      =   $request->email;
            $password   =   "12345678";
            // $password   =   Str::random(8);
            $data = [
                'customer_enquiry_date' => $request->customer_enquiry_date,
                'full_name'             => $request->user_name,
                'company_name'          => $request->company_name,
                'contact_person'        => $request->contact_person,
                'remarks'               => $request->remarks,
                'mobile_no'             => $request->mobile_no,
                'email'                 => strtolower($email),
                'password'              => Hash::make($password),
                'password_view'         =>  $password,
                'created_by'            => Admin()->id,
                'updated_by'            => Admin()->id,
                'is_active'             => 0
            ];
            $customer = $this->customer->create($data);
            $customer->enquiry()->create(['customer_enquiry_number' => $latest_enquiry_number,  'enquiry_number' => $enquiry_number, 'created_by'=> Admin()->id, 'enquiry_date' => now()]);
            DB::commit();
            GlobalService::updateConfig('CENQ');
            GlobalService::updateConfig('ENQ');
            $details = [
                'customer_name'     => $request->contact_person,
                'customer_email'    => $request->email,
                'customer_pws'      => $password
            ]; 
            Mail::to($request->email)->send(new \App\Mail\Enquiry($details));
            return response(['status' => true, 'data' => $customer ,'msg' => trans('enquiry.created')], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();
            return response(['status' => false, 'data' => '' ,'msg' => trans('global.something')], Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id)->where('is_active',1);

        if( empty( $customer ) ) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        } 
        return response(['status' => true, 'msg' =>'', 'data' => $customer ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::find($id)->where('is_active',1);
        if( empty($customer) ) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        }
        $customer->company_name   = $request->company_name;
        $customer->contact_person = $request->contact_person;
        $customer->mobile_number  = $request->mobile_number;
        $customer->email          = $request->email;
        $customer->enquiry_date   = $request->enquiry_date;
        $customer->full_name      = $request->user_name;
        $res = $customer->save();
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('enquiry.updated')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('global.something')], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
 
    public function status($id) {
        $customer = Customer::find($id);
        if( empty($customer) ) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        }
        $customer->is_active = !$customer->is_active;
        $res = $customer->save();
        if( $res ) {
            return response(['status' => true, 'msg' => trans('enquiry.status_updated'), 'data' => $customer], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('enquiry.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }  
}
