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
use App\Interfaces\EnquiryCommentRepositoryInterface;
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
use Laracasts\Flash\Flash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class EnquiryController extends Controller
{
    protected $customerEnquiryRepo;
    protected $serviceRepo;
    protected $documentTypeRepo;
    protected $buildingComponent;
    protected $commentRepo;
    protected $enquiryCommentRepo;
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
        OutputTypeRepositoryInterface $outputTypeRepository,
        EnquiryCommentRepositoryInterface $enquiryCommentRepo
    ) {
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
        $this->serviceRepo             = $serviceRepo;
        $this->documentTypeRepo        = $documentType;
        $this->buildingComponent       = $buildingComponent;
        $this->commentRepo             = $comment;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
        $this->customer                = $customerRepository;
        $this->outputTypeRepository    = $outputTypeRepository;
        $this->enquiryCommentRepo      = $enquiryCommentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if (!userHasAccess('enquiry_index')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        return view('admin.enquiry.index');
    }

    public function getUnattendedEnquiries(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;
            $projectType = isset($request->project_type) ? $request->project_type : false;
            $dataDb = Enquiry::with(['projectType', 'technicalEstimate', 'costEstimate', 'comments' => function ($q) {
                $q->where(['status' => 0, 'created_by' => 'Customer']);
            }, 'customer' => function ($q) {
                $q->where('is_active' ,1);
            }])
                ->where(['status' => 'Submitted', 'project_status' => 'Unattended'])
                ->when(userRole()->slug == config('global.technical_estimater'), function ($q) {
                    return $q->whereHas('technicalEstimate', function ($q) {
                        $q->where('assign_to', Admin()->id);
                    });
                })
                ->when(userRole()->slug == config('global.cost_estimater'), function ($q) {
                    return $q->whereHas('costEstimate', function ($q) {
                        $q->where('assign_to', Admin()->id);
                    });
                })
                ->where('enquiry_number', '!=', 'Draft')
                ->where('proposal_email_status', 0)
                ->WhereNotIn('project_status', ['Active'])
                ->whereBetween('enquiry_date', [$fromDate, $toDate])
                ->when($enquiryNumber, function ($q) use ($enquiryNumber) {
                    $q->where('enquiry_number', $enquiryNumber);
                })
                ->when($projectType, function ($q) use ($projectType) {
                    $q->where('project_type_id', $projectType);
                })
                ->orderBy('id', 'desc');
            return DataTables::eloquent($dataDb)
                ->editColumn('enquiry_number', function ($dataDb) {
                    $commentCount = $dataDb->comments->count();
                    $enquiryComments = $commentCount == 0 ? '' : $commentCount;
                    return '
                    <button type="button" class="btn-quick-view" onclick="EnquiryQuickView(' . $dataDb->id . ' , this)" >
                        <b>' . $dataDb->enquiry_number . '</b>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $enquiryComments . '</span>
                        ' . getModuleChatCount('ADMIN', 'ENQUIRY', $dataDb->id) . '
                    </button>
                ';
                })
                ->addColumn('projectType', function ($dataDb) {
                    return $dataDb->projectType->project_type_name ?? '';
                })
                ->editColumn('project_status', function ($dataDb) {
                    return '<small class="px-1 bg-danger text-white rounded-pill text-center">' . $dataDb->project_status . '</small>';
                })

                ->editColumn('enquiry_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->enquiry_date)->format($format);
                })
                ->addColumn('pipeline', function ($dataDb) {
                    return '<div class="btn-group">
                    <button  class="btn progress-btn ' . ($dataDb->status == 'Submitted' ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Initiation"></button>
                    <button  class="btn progress-btn ' . ($dataDb->technical_estimation_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical Estimation"></button>
                    <button  class="btn progress-btn ' . ($dataDb->cost_estimation_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cost Estimation"></button>
                    <button  class="btn progress-btn ' . ($dataDb->proposal_sharing_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proposal Sharing"></button>
                    <button  class="btn progress-btn ' . ($dataDb->customer_response == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Customer Response"></button>
                </div>';
                })
                ->addColumn('action', function ($dataDb) {
                    return '<div class="dropdown">
                            <button class="btn py-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="' . route('view-enquiry', $dataDb->id) . '">View / Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="' . route('enquiry.delete', $dataDb->id) . '" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'pipeline', 'enquiry_number', 'project_status'])
                ->make(true);
        }
    }

    public function getActiveEnquiries(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;
            $projectType = isset($request->project_type) ? $request->project_type : false;
            $dataDb = Enquiry::with(['projectType',  'comments' => function ($q) {
                $q->where(['status' => 0, 'created_by' => 'Customer']);
            }])
                ->where(['proposal_email_status' => 1])
                ->whereNull('project_id')
                ->whereBetween('enquiry_date', [$fromDate, $toDate])
                ->when($enquiryNumber, function ($q) use ($enquiryNumber) {
                    $q->where('enquiry_number', $enquiryNumber);
                })
                ->when($projectType, function ($q) use ($projectType) {
                    $q->where('project_type_id', $projectType);
                })
                ->orderBy('id', 'desc');
            return DataTables::eloquent($dataDb)
                ->editColumn('enquiry_number', function ($dataDb) {
                    $commentCount = $dataDb->comments->count();
                    $enquiryComments = $commentCount == 0 ? '' : $commentCount;
                    return '
                    <button type="button" class="btn-quick-view" onclick="EnquiryQuickView(' . $dataDb->id . ' , this)" >
                        <b>' . $dataDb->enquiry_number . '</b>
                        ' . getModuleChatCount('ADMIN', 'ENQUIRY', $dataDb->id) . '
                    </button>
                ';
                })
                ->addColumn('projectType', function ($dataDb) {
                    return $dataDb->projectType->project_type_name ?? '';
                })
                ->editColumn('project_status', function ($dataDb) {
                    if ($dataDb->response_status == 0) {
                        $status = '<small class="px-1 bg-info text-white rounded-pill text-center">Active</small>';
                    }
                    if ($dataDb->response_status == 1) {
                        $status = '<small class="px-1 bg-success text-white rounded-pill text-center">Responded</small>';
                    }
                    if ($dataDb->response_status == 2) {
                        $status = '<small class="px-1 bg-warning text-white rounded-pill text-center">Awaiting Response</small>';
                    }
                    return $status;
                })

                ->editColumn('enquiry_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->enquiry_date)->format($format);
                })
                ->editColumn('follow_up_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->follow_up_date)->format($format);
                })
                ->addColumn('pipeline', function ($dataDb) {
                    return '<div class="btn-group" ng-click=toggle("edit",' . $dataDb->id . ')>
                <button  class="btn progress-btn ' . ($dataDb->status == 'Submitted' ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Initiation"></button>
                <button  class="btn progress-btn ' . ($dataDb->technical_estimation_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical Estimation"></button>
                <button  class="btn progress-btn ' . ($dataDb->cost_estimation_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cost Estimation"></button>
                <button  class="btn progress-btn ' . ($dataDb->proposal_email_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proposal Sharing"></button>
                <button  class="btn progress-btn ' . ($dataDb->customer_response == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Customer Response"></button>
                </div>';
                })
                ->addColumn('action', function ($dataDb) {
                    return '<div class="dropdown">
                            <button class="btn py-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="' . route('view-enquiry', $dataDb->id) . '">View / Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'pipeline', 'enquiry_number', 'project_status'])
                ->make(true);
        }
    }

    public function getCancelledEnquiries(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;
            $projectType = isset($request->project_type) ? $request->project_type : false;
            $dataDb = Enquiry::with(['projectType', 'comments' => function ($q) {
                $q->where(['status' => 0, 'created_by' => 'Customer']);
            }])
                ->where(['status' => 'Submitted', 'project_status' => 'Cancelled'])
                ->whereBetween('enquiry_date', [$fromDate, $toDate])
                ->when($enquiryNumber, function ($q) use ($enquiryNumber) {
                    $q->where('enquiry_number', $enquiryNumber);
                })
                ->when($projectType, function ($q) use ($projectType) {
                    $q->where('project_type_id', $projectType);
                })
                ->orderBy('id', 'desc');
            return DataTables::eloquent($dataDb)
                ->editColumn('enquiry_number', function ($dataDb) {
                    $commentCount = $dataDb->comments->count();
                    $enquiryComments = $commentCount == 0 ? '' : $commentCount;
                    return '
                    <button type="button" class="btn-quick-view" onclick="EnquiryQuickView(' . $dataDb->id . ' , this)" >
                        <b>' . $dataDb->enquiry_number . '</b>
                        ' . getModuleChatCount('ADMIN', 'ENQUIRY', $dataDb->id) . '
                    </button>
                ';
                })
                ->addColumn('projectType', function ($dataDb) {
                    return $dataDb->projectType->project_type_name ?? '';
                })
                ->editColumn('project_status', function ($dataDb) {
                    return '<small class="px-1 bg-danger text-white rounded-pill text-center">' . $dataDb->project_status . '</small>';
                })

                ->editColumn('enquiry_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->enquiry_date)->format($format);
                })
                ->addColumn('pipeline', function ($dataDb) {
                    return '<div class="btn-group" ng-click=toggle("edit",' . $dataDb->id . ')>
                <button  class="btn progress-btn ' . ($dataDb->status == 'Submitted' ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Initiation"></button>
                <button  class="btn progress-btn ' . ($dataDb->technical_estimation_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical Estimation"></button>
                <button  class="btn progress-btn ' . ($dataDb->cost_estimation_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cost Estimation"></button>
                <button  class="btn progress-btn ' . ($dataDb->proposal_sharing_status == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proposal Sharing"></button>
                <button  class="btn progress-btn ' . ($dataDb->customer_response == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Customer Response"></button>
                </div>';
                })
                ->addColumn('action', function ($dataDb) {
                    return '<div class="dropdown">
                            <button class="btn py-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="' . route('view-enquiry', $dataDb->id) . '">View</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'pipeline', 'enquiry_number', 'project_status'])
                ->make(true);
        }
    }

    public function singleIndex($id)
    {
        $this->customerEnquiryRepo->updateNewEnquiryStatus($id);
        $enquiry                        =   $this->customerEnquiryRepo->getEnquiryByID($id);
        $outputTypes                    =   $this->outputTypeRepository->get();
        $services                       =   $enquiry->services()->get();
        $result['progress']             =   $enquiry;
        $result['customer_info']        =   $enquiry->customer;
        $result["enquiry_number"]       =   $enquiry->enquiry_number;
        $result["customer_enquiry_number"] =   $enquiry->customer_enquiry_number;
        $result["enquiry_comments"]        = $this->enquiryCommentRepo->getCommentsCountByType($id)->pluck('comments_count', 'type');
        $result["enquiry_active_comments"] = $this->enquiryCommentRepo->getActiveCommentsCountByType($id)->pluck('comments_count', 'type');
        $result['cost_estimate_comments'] = $this->enquiryCommentRepo->getCostEstimateCount($id)->pluck('comments_count', 'created_by');
        $result["enquiry_id"]           =   $enquiry->id;
        $result["enquiry_status"]       =   $enquiry->customer_response;
        $result["enquiry"]              =   $this->customerEnquiryRepo->formatEnqInfo($enquiry);
        $result['project_info']         =   $this->customerEnquiryRepo->formatProjectInfo($enquiry);
        $result['services']             =   $this->formatServices($outputTypes, $services);
        $result['ifc_model_uploads']    =   $enquiry->documentTypes;
        $result['building_component']   =   $this->customerEnquiryRepo->getBuildingComponent($enquiry);
        $result['additional_infos']     =   $this->commentRepo->getCommentByEnquiryId($enquiry->id);
        $result['project_type']         =   $enquiry->projectType;
        $result['technical_estimate']   =   $enquiry->technicalEstimate;
        $result['cost_estimate']        =   $enquiry->costEstimate;
        $result['follow_up_date']       =   $enquiry->follow_up_date;
        $result['follow_up_status']     =   $enquiry->follow_up_status;
        $result['follow_up_by']         =   $enquiry->follow_up_by;
        return $result;
    }

    public function formatServices($outputTypes, $services)
    {
        $result = [];
        foreach ($outputTypes as $outputType) {
            foreach ($services as $service) {
                if ($service->output_type_id == $outputType->id) {
                    $result[$outputType->output_type_name][] = $service;
                }
            }
        }
        return $result;
    }
    public function singleIndexPage($id = null)
    {
        if (!userHasAccess('enquiry_index')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        if ($id) {
            session()->put('enquiry_id', $id);
            $data   =   Enquiry::with('customer')->find($id);
            $activeTab = $this->getRoleBaseTab() == false ? $this->getIncompleteTab($data) : $this->getRoleBaseTab();
            return view('admin.enquiry.show', compact('data', 'activeTab', 'id'));
        } else {
            return redirect()->route('admin.enquiry-list');
        }
    }

    public function getRoleBaseTab()
    {
        // $role_name = userRole()->slug;
        // if($role_name == config('global.technical_estimater')){
        //     return 'technical-estimation';
        // } else if($role_name == config('global.cost_estimater')){
        //     return 'cost-estimation';
        // }
        return false;
    }

    public function getIncompleteTab($enquiry)
    {
        if ($enquiry->status == 'In-Complete') {
            return 'project-summary';
        } else if ($enquiry->technical_estimation_status == 0) {
            return 'technical-estimation';
        } else if ($enquiry->cost_estimation_status == 0) {
            return 'cost-estimation';
        } else if ($enquiry->proposal_email_status == 0) {
            return 'proposal-sharing';
        } else if ($enquiry->customer_response == 0 || 1 || 2) {
            return 'move-to-project';
        }
        return 'project-summary';
    }

    public function getEnquiryNumber(Request $request)
    {
        return  GlobalService::enquiryNumber();
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
        if (!userHasAccess('enquiry_add')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        DB::beginTransaction();
        try {
            $customerEnquiryNo = GlobalService::customerEnquiryNumber();
            $email      =   $request->email;
            $password   =   "12345678";             // $password   =   Str::random(8);
            $data = [
                'customer_enquiry_date' => $request->customer_enquiry_date,
                'company_name'          => $request->company_name,
                'organization_no'       => $request->organization_no,
                'contact_person'        => $request->contact_person,
                'remarks'               => $request->remarks,
                'mobile_no'             => $request->mobile_no,
                'email'                 => strtolower($email),
                'password'              => $password,
                'password_view'         =>  $password,
                'created_by'            => Admin()->id,
                'updated_by'            => Admin()->id,
                'is_active'             => 1
            ];
            $customer = $this->customer->create($data);
            $customer->enquiry()->create([
                'initiate_from'           => 'admin',
                'customer_enquiry_number' => $customerEnquiryNo,
                'enquiry_number'          => 'Draft',
                'project_delivery_date'   => now()->addDays(1),
                'created_by'              => Admin()->id,
                'contact_person'          => $request->contact_person,
                'project_name'            => $request->project_name,
                'mobile_no'               => $request->mobile_no,
                'company_name'            => $request->company_name,
                'enquiry_date'            => now()
            ]);
            DB::commit();
            GlobalService::updateConfig('CENQ');
            $details = [
                'customer_name'     => $request->contact_person,
                'customer_email'    => $request->email,
                'customer_pws'      => $password
            ];
            Flash::success(__('enquiry.created'));
            Mail::to($request->email)->send(new \App\Mail\Enquiry($details));
            return response(['status' => true, 'data' => $customer, 'msg' => trans('enquiry.created')], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();
            Flash::error(__('global.something'));
            return response(['status' => false, 'data' => '', 'msg' => trans('global.something')], Response::HTTP_OK);
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
        if (!userHasAccess('enquiry_edit')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        $customer = Customer::find($id)->where('is_active', 1);

        if (empty($customer)) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        }
        return response(['status' => true, 'msg' => '', 'data' => $customer], Response::HTTP_OK);
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
        $customer = Customer::find($id)->where('is_active', 1);
        if (empty($customer)) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        }
        $customer->company_name    = $request->company_name;
        $customer->organization_no = $request->organization_no;
        $customer->contact_person = $request->contact_person;
        $customer->mobile_number  = $request->mobile_number;
        $customer->email          = $request->email;
        $customer->enquiry_date   = $request->enquiry_date;
        $customer->full_name      = $request->user_name;
        $res = $customer->save();
        if ($res) {
            return response(['status' => true, 'data' => $res, 'msg' => trans('enquiry.updated')], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('global.something')], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!userHasAccess('enquiry_delete')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        $result = $this->customerEnquiryRepo->delete($id);
        if ($result) {
            return response(['status' => true, 'msg' => __('global.deleted')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function status($id)
    {
        $customer = Customer::find($id);
        if (empty($customer)) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        }
        $customer->is_active = !$customer->is_active;
        $res = $customer->save();
        if ($res) {
            return response(['status' => true, 'msg' => trans('enquiry.status_updated'), 'data' => $customer], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('global.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function updateFollowUp(Request $request)
    {
        $id = $request->enquiry_id;
        $data = [
            'follow_up_date'   => $request->follow_up_date,
            'follow_up_status' => $request->follow_up_status,
            'follow_up_comment' => $request->follow_up_comment,
            'follow_up_by'     => Admin()->id,
        ];
        $response = $this->customerEnquiryRepo->updateFollowUp($id, $data);
        if ($response) {
            return response(['status' => true, 'msg' => trans('enquiry.follow_up_updated')], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('global.something')]);
    }

    public function getActiveCommentsCount()
    {
        $comments = DB::select("
            select sum(c.total) as active_count  from (
                select count(*) as total from aec_propoal_versions
                                where status in ('denied','approved','obsolete')
                                and enquiry_id in (select id from aec_enquiries ae where project_id is null)
                union

                select count(*) as total from aec_enquiry_proposal
                        where status in ('denied','approved','obsolete')
                        and enquiry_id in  (select id from aec_enquiries ae where project_id is null)
            ) as c
        ")[0];

        $unestablishedCount = DB::select("
        select count(*) as unestablished_count from aec_enquiries ae where status = 'Submitted' and project_status = 'Unattended' and is_new_enquiry = 1
        ")[0];
        return [$comments, $unestablishedCount];
    }

    public function getActiveEnquires()
    {
        $response = $this->customerEnquiryRepo->getActiveEnquiry();
        if ($response) {
            return response(['status' => true, 'data' => $response, 'msg' => trans('')], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('global.something')]);
    }

    public function assignEstimationToEnquiry($id, Request $request)
    {
        $response =  $this->customerEnquiryRepo->assignEstimationToEnquiry($id, $request->all());
        if ($response) {
            return response(['status' => true, 'data' => $response, 'msg' => trans('enquiry.estimation_assigned')], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('global.something')]);
    }

    public function getVersion()
    {
        phpinfo();
        die();
    }
}
