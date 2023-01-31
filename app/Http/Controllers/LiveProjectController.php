<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use App\Models\LiveProjectSubSubTasks;
use App\Models\LiveProjectSubTasks; 
use App\Repositories\LiveProjectRepository;
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

    public function store(Request $reuqest, $menu_type ,$id)
    {
        $result = $this->LiveProjectRepository->wizard_tabs_store($reuqest,$menu_type,$id); 
        if(!$result) {
            return redirect()->route('live-project.menus-index',[
                "menu_type" => $reuqest->menu_type,
                "id" => $id
            ]);
        }
        return redirect()->back()->with('success',"Successfuly Created!"); 
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
            $table = DataTables::of(Issues::select('*'));
            $table->addIndexColumn();
            $table->addColumn('title_type', function($row){ 
                return Str::limit($row->title,28,' ...');
            });
            $table->addColumn('issue_id', function($row){ // '.Project()->reference_number.'
                return '<button type="button" class="btn-quick-view">ISS/00'.$row->id.'</button>';
            });
            $table->addColumn('status_type', function($row){ 
                if($row->status == 'NEW') {
                    return '<span class="badge badge-danger-lighten">New</span>';
                }
            });
            $table->addColumn('priority_type', function($row){ 
                if($row->priority == 'CRITICAL') {
                    return "<small>🔴 ".ucfirst(strtolower($row->priority))." </small>";
                }elseif($row->priority == 'HIGH') {
                    return "<small>🔴 ".ucfirst(strtolower($row->priority))." </small>";
                }elseif($row->priority == 'MEDIUM') {
                    return "<small>🟠 ".ucfirst(strtolower($row->priority))." </small>";
                }elseif($row->priority == 'LOW') {
                    return "<small>🟢 ".ucfirst(strtolower($row->priority))." </small>";
                }
            });
            $table->addColumn('action', function($row){
                return '
                    <i class="fa fa-eye text-success"></i>
                    <i class="fa fa-trash text-danger btn-sm"></i>
                ';
            });
            $table->rawColumns(['action','issue_id','priority_type','status_type']);
            return $table->make(true);
        }
    }
}