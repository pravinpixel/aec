<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\projectComment;
use App\Models\ProjectTicket;
use App\Models\TicketcommentsReplay;
use DateTime;

class CustomerProjectController extends Controller
{
    protected $projectRepo;
    public function __construct(
        ProjectRepository $projectRepo
    ) {
        $this->projectRepo        = $projectRepo;
       
    }

    public function index(Request $request){
        return view('customer.projects.index');
    }
    public function unestablishedProjectList(Request $request)
    {
        if ($request->ajax() == true) {
            $dataDb = $this->projectRepo->unestablishedProjectList($request);
            return DataTables::eloquent($dataDb)
                ->editColumn('reference_number', function ($dataDb) {
                    return '
                    <button type="button" ng-click=getQuickProject("create_project",' . $dataDb->id . ') class="btn-quick-view" ng-click=toggle("edit",' . $dataDb->id . ')>
                        <b>' . $dataDb->reference_number . '</b>
                    </button>
                ';
                })
                ->editColumn('start_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->start_date)->format($format);
                })
                ->editColumn('delivery_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->delivery_date)->format($format);
                })
                ->addColumn('pipeline', function ($dataDb) {
                    return '<div class="btn-group">
                    <button ng-click=getQuickProject("create_project",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_create_project == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Create"></button> 
                    <button ng-click=getQuickProject("connect_platform",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_teamsetup == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Connect Platform"></button> 
                    <button ng-click=getQuickProject("teamsetup",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_teamsetup == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Team Setup"></button> 
                    <button ng-click=getQuickProject("invoice_plan",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_invoice_plan == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Invoice Plan"></button> 
                    <button ng-click=getQuickProject("to_do_list",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_todo_list == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="To-do List"></button> 
                </div>';
                })
                ->addColumn('action', function ($dataDb) {
                    return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="' . route('edit-projects', $dataDb->id) . '">View / Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="' . route('enquiry.delete', $dataDb->id) . '" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'pipeline', 'reference_number'])
                ->make(true);
        }
    }


    public function liveProjectList(Request $request)
    {
        
        if ($request->ajax() == true) {
            $dataDb = $this->projectRepo->liveProjectList($request);
            // $dataDb = Project::with(['comments'=> function($q){
            //     $q->where(['status' => 0, 'created_by' => 'Admin']);
            // }]);
            //dd($dataDb);
            return DataTables::eloquent($dataDb)
                ->editColumn('reference_number', function ($dataDb) {
                    $commentCount = $dataDb->comments->count();
                    $projectComments = $commentCount == 0 ? '' : $commentCount;
                    return '
                    <button type="button" ng-click=getQuickProject("create_project",' . $dataDb->id . ') class="btn-quick-view" ng-click=toggle("edit",' . $dataDb->id . ')>
                        <b>' . $dataDb->reference_number . '</b>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.$projectComments.'</span>
                    </button>
                ';
                })
                ->editColumn('start_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->start_date)->format($format);
                })
                ->editColumn('delivery_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->delivery_date)->format($format);
                })
                ->addColumn('pipeline', function ($dataDb) {
                    $totaloverall = array();
                    $result = array();
                    $projechtchart =  isset($dataDb->gantt_chart_data) ? json_decode($dataDb->gantt_chart_data) :array();
                    foreach($projechtchart as $projectdata){
                        foreach($projectdata->data as $key=>$prodata){
                            $finalstatuspercentage = array();
                            $overall = count($prodata->data);
                            $totaloverall[] = $overall;
                            foreach($prodata->data as $finaldata){
                                $delivery_date = isset($finaldata->delivery_date) ? Carbon::parse($finaldata->delivery_date)->format('Y-m-d') : '';

              
                                if(isset($finaldata->status) &&  $finaldata->status !=  ''){
                                 $finalstatuspercentage[] =   $finaldata->status;
                                } 
                                $gnttname[] = $finaldata->task_list;
                              
                                $date_now = date("Y-m-d"); // this format is string comparable
                                
                                if (isset($delivery_date) && $date_now > $delivery_date) {
                                 $datetime1 = new DateTime($date_now);
                                 $datetime2 = new DateTime($delivery_date);
                                 $intervalday[] = $datetime1->diff($datetime2)->days * 24;
                                }else{
                                 $intervalday[] = 0;
                                }
                                 
                              
             
                                $days = (strtotime($finaldata->start_date) - strtotime($finaldata->end_date)) / (60 * 60 * 24);
                                $start  = date_create(str_replace('/','-',$finaldata->start_date));
                                $end    = date_create(str_replace('/','-',$finaldata->end_date)); // Current time and date
                                $diff   = date_diff( $start, $end );
                                $seriesdata[] = array('y'=>$diff->days * 24,
                                                     'color'=>'#008ffb' );

                            
                                $completecount = count($finalstatuspercentage);
                                $totalcompletecount[] = $completecount;
                                $rearr[] = array('name' =>$finaldata->get_task_list->task_list_name ?? ' ',
                                                'completed'=> round(($completecount /$overall )*100),2);
                            }
                        }

                    }
                    if(count($projechtchart) > 0){
         
                        $result = array('overall'=> round(((array_sum($totalcompletecount) / array_sum($totaloverall))*100),2),
                        'completed' => $rearr);
                        //dd($result);
                    }else{
                        $result = array('overall'=> 0,
                        'completed' => 0);
                    }
                    $width = $result['overall'] == 0 ? '0%' : $result['overall'].'%';
                    $color = $result['overall'] == 0 ? 'bg-danger' : 'bg-success';
                    return '
                        <div class="progress bg-light border" style="position:relative;"> 
                            <div class="progress-bar '.$color.' progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$width.';" aria-valuenow="'. $result['overall'].'" aria-valuemin="0" aria-valuemax="100">
                                <small class="smallTag">'. $result['overall'].'%</small>
                            </div>
                        </div>
                    ';
                })
                ->addColumn('action', function ($dataDb) {
                    return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route('live-project.menus-index',['menu_type'=>'overview','id'=> $dataDb->id]).'">Edit/View</a>
                                <a class="dropdown-item" href="'.route('customer-live-projects-data', $dataDb->id).'">View/Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="'.route('enquiry.delete', $dataDb->id).'" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'pipeline', 'reference_number'])
                ->make(true);
        }
    }

    public function live($id){
        if(!empty(Customer()->id)){
            $seen_user = 'Customer';
        }else{
            $seen_user = 'Admin';
        }
       $issuescount =  TicketcommentsReplay :: Where('project_id',$id)
                                ->Where('seen_user',$seen_user)
                                ->where('status',0)
                                ->count();
        $data =array('issues' => ($issuescount != '0') ? $issuescount : '');
        $chat=projectComment::where('project_id',$id)->get();
       
        return view('customer.projects.live-project.index', compact('id','data','chat')); 
    }
    public function approveOrDeny(Request $request){
        $ticket_id = $request->ticket_id;
        $ticket_comment_id =$request->ticket_comment_id;
        $type               = $request->type;
        $comment            = isset($request->comment) ? $request->comment :'';
        ProjectTicket ::Where(['id'=>$ticket_id])
                     ->update(['variation_status' => $request->type,'action_comment' =>$comment,'customer_response' =>2]); 
         return response(['status' => true, 'msg' => 'Variation Updated']);
        }

    
}
