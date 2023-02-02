<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use App\Models\LiveProjectSubSubTasks;
use App\Models\LiveProjectSubTasks; 
use App\Repositories\LiveProjectRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class LiveProjectController extends Controller
{
    protected $LiveProjectRepository;

    public function __construct(LiveProjectRepository $LiveProjectRepository){
        $this->LiveProjectRepository  = $LiveProjectRepository;
    }
    
    public function index($menu_type,$id=null)
    { 
        return $this->LiveProjectRepository->wizard_tabs_index($menu_type,$id);  
    }

    public function store(Request $request, $menu_type ,$id)
    {
        if($request->form_type == 'CREATE_ISSUE') {
            $this->LiveProjectRepository->wizard_tabs_store($request,$menu_type,$id); 
            return redirect()->back()->with('success',"Successfuly Created!"); 
        }
        return redirect()->route('live-project.menus-index',["menu_type" => $request->menu_type,"id" => $id]);
    }

    public function milestones_index($project_id)
    {
        return $this->LiveProjectRepository->get_milestones($project_id);
    }

    public function store_milestones(Request $request, $project_id)
    {
        return $this->LiveProjectRepository->store_milestones($project_id,$request);
    }

    public function update_milestones(Request $request, $project_id,$task_id)
    {
        return $this->LiveProjectRepository->update_milestones($project_id,$task_id,$request);
    }
    public function destroy_milestones($project_id,$task_id)
    {
        return $this->LiveProjectRepository->destroy_milestones($task_id);
    }
    public function store_milestones_link(Request $request,$project_id)
    {
        return $this->LiveProjectRepository->store_milestones_link($project_id,$request);
    }
    public function destroy_milestones_link($project_id,$link_id)
    {
        return $this->LiveProjectRepository->destroy_milestones_link($project_id,$link_id);
    }

    public function task_list_index ($project_id)
    {
        $project = $this->LiveProjectRepository->task_list_index($project_id);
        return response()->json([
            "status" => true,
            "view"   => "$project"
        ]);
    }

    public function sub_task_index($task_id)
    { 
        $view = $this->LiveProjectRepository->get_sub_task_view($task_id);
        return response()->json([
            "status" => true,
            "view"   => "$view"
        ]);
    }
    public function update_sub_sub_task(Request $request,$sub_sub_task_id)
    {
        $task = LiveProjectSubSubTasks::find($sub_sub_task_id);
        $task->update([
            $request->type => $request->value
        ]);
        return response()->json([
            "status" => true
        ]);
    }
    public function delete_sub_sub_task($sub_sub_task_id)
    {
        $LiveProjectSubSubTasks = LiveProjectSubSubTasks::find($sub_sub_task_id);
        $sub_task_id = $LiveProjectSubSubTasks->sub_task_id;
        $LiveProjectSubSubTasks->delete();
        $result = $this->LiveProjectRepository->getSubTaskProgress($sub_task_id);
        return response()->json([
            "status"   => true,
            "progress" => "$result"
        ]);
    }
    public function create_sub_task(Request $request,$sub_task_id)
    {
        $LiveProjectSubTasks = LiveProjectSubTasks::find($sub_task_id);
        $LiveProjectSubTasks->SubSubTasks()->create([
            'name'          => $request->TaskName,
            'assign_to'     => $request->AssignTo,
            'start_date'    => $request->StartDate,
            'end_date'      => $request->EndDate,
            'delivery_date' => $request->DeliveryDate,
            'status'        => 0
        ]);
        return response()->json([
            "status" => true
        ]);
    }
    public function delete_sub_task($sub_task_id)
    {
        $LiveProjectSubTasks = LiveProjectSubTasks::with('SubSubTasks')->find($sub_task_id);
        $LiveProjectSubTasks->update(['status' => 0]);
        if(!is_null($LiveProjectSubTasks->SubSubTasks)) {
            $LiveProjectSubTasks->SubSubTasks()->delete();
        } 
        $LiveProjectSubTasks->delete();
        return response()->json([
            "status"   => true, 
        ]);
    }

    public function set_progress(Request $request, $project_id)
    {
        $result = $this->LiveProjectRepository->task_status_update_and_index($project_id,$request); 
    
        return response()->json([
            "status" => true,
            "progress" => "$result",
        ]);
    }
    public function issues(Request $request)
    {
        if($request->ajax()) { 
            $Issues = Issues::select('*');
            if($request->filters) {
                $Issues->when(isset($request->filters['Priority']),function($q) use ($request) {
                    $q->where('priority',$request->filters['Priority']);
                });
                $Issues->when(isset($request->filters['Status']),function($q) use ($request) {
                    $q->where('status',$request->filters['Status']);
                });
                $Issues->when(isset($request->filters['IssueType']),function($q) use ($request) {
                    $q->where('type',$request->filters['IssueType']);
                });
                $Issues->when(isset($request->filters['IssueId']),function($q) use ($request) {
                    $q->where('issue_id',$request->filters['IssueId']);
                });
                $Issues->when(isset($request->filters['DueStartDate']) && isset($request->filters['DueEndDate']),function($q) use ($request) {
                    $q->whereDate('due_date', '>=' , $request->filters['DueStartDate']);
                    $q->whereDate('due_date', '<=' , $request->filters['DueEndDate']);
                });
                $Issues->when(isset($request->filters['RequestStartDate']) && isset($request->filters['RequestEndDate']),function($q) use ($request) {
                    $q->whereDate('created_at', '>=' , $request->filters['RequestStartDate']);
                    $q->whereDate('created_at', '<=' , $request->filters['RequestEndDate']);
                });
            }
            $table = DataTables::of($Issues);
            $table->addIndexColumn(); 
            $table->addColumn('issue_type', function($row){
                if($row->type == 'INTERNAL') {
                    return '<small class="badge bg-danger rounded-pill"><i style="transform: rotate(-45deg)" class="fa fa-ticket" aria-hidden="true"></i> Internal</small>';
                } else {
                    return '<small class="badge badge-danger-lighten rounded-pill"><i style="transform: rotate(-45deg)" class="fa fa-ticket" aria-hidden="true"></i> External</small>';
                }
            });
            $table->addColumn('requested_date', function($row){ 
                return Carbon::parse($row->created_at)->format('Y-m-d');
            });
            $table->addColumn('title_type', function($row){ 
                return Str::limit($row->title,28,' ...');
            });
            $table->addColumn('issue_id', function($row){ // '.Project()->reference_number.'
                return '<button type="button" class="btn-quick-view" onclick="showIssue('.$row->id.' , this)" >'.$row->issue_id.'</button>';
            });
            $table->addColumn('status_type', function($row){  
                return '
                    <select name="Status" onchange="ChangeIssueStatus('.$row->id.',this)" class="rounded-pill shadow-sm border border-light" value="'.$row->ststus.'" style="outline:none">
                        <option '.select_status("NEW",$row).' value="NEW">'.__('project.NEW').'</option>
                        <option '.select_status("OPEN",$row).' value="OPEN">'.__('project.OPEN').'</option>
                        <option '.select_status("PENDING",$row).' value="PENDING">'.__('project.PENDING').'</option>
                        <option '.select_status("CLOSED",$row).' value="CLOSED">'.__('project.CLOSED').'</option>
                    </select>
                ';
            });
            $table->addColumn('priority_type', function($row){ 
                if($row->priority == 'CRITICAL') {
                    return "<small>🔴 ".ucfirst(strtolower($row->priority))." </small>";
                }elseif($row->priority == 'HIGH') {
                    return "<small>🟠 ".ucfirst(strtolower($row->priority))." </small>";
                }elseif($row->priority == 'MEDIUM') {
                    return "<small>🟡 ".ucfirst(strtolower($row->priority))." </small>";
                }elseif($row->priority == 'LOW') {
                    return "<small>🟢 ".ucfirst(strtolower($row->priority))." </small>";
                }
            });
            $table->addColumn('action', function($row){
                return '
                    <i class="fa fa-share btn-outline-danger" onclick="convertVariation('.$row->id.',this)" title="Convert to variation Order"></i>
                    <span onclick="showIssue('.$row->id.',this)" title="View" class="mx-1"><i class="fa fa-eye text-success"></i></span>
                    <i onclick="deleteIssue('.$row->id.',this)" title="Delete" class="fa fa-trash text-danger"></i>
                ';
            });
            $table->rawColumns(['action','issue_id','priority_type','status_type','issue_type','requested_date']);
            return $table->make(true);
        }
    }

    public function show_issues($id)
    {
        $issue = Issues::with('IssuesAttachments')->find($id);
        $view  = view('live-projects.templates.issues-model',compact('issue'));
        return response([
            "view"  => "$view",
        ]);
    }
    public function delete_issues($id)
    {
        try {
            Issues::with('IssuesAttachments')->find($id)->delete();
            return response([
                "status"  => true,
            ]);
        } catch (\Throwable $th) {
            return response([
                "status"  => false,
            ]);
        }
    }
    public function change_status_issues(Request $request, $id)
    {
        return Issues::find($id)->update([
            "status" =>$request->status
        ]);
    }
}