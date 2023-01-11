<?php

namespace App\Http\Controllers;

use App\Models\Admin\Employees;
use App\Models\LiveProjectSubSubTasks;
use App\Models\LiveProjectSubTasks;
use App\Models\LiveProjectTasks;
use App\Models\Role;
use App\Repositories\LiveProjectRepository;
use Illuminate\Http\Request;
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
        return redirect()->route('live-project.menus-index',[
            "menu_type" => $reuqest->menu_type,
            "id" => $id
        ]);
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
        $role = Role::where('slug', 'project_manager')->first();
        $managers = [];
        if(!empty($role)) {
            $managers = Employees::where('job_role', $role->id)->select('display_name','id')->get()->toArray();
        } 
        $task = LiveProjectTasks::with('SubTasks','SubTasks.SubSubTasks')->find($task_id);
        $view = view('live-projects.templates.sub-task-model',compact('task','managers'));
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
        LiveProjectSubSubTasks::find($sub_sub_task_id)->delete();
        return response()->json([
            "status" => true
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
        ]);
        return response()->json([
            "status" => true
        ]);
    }
    public function delete_sub_task($sub_task_id)
    {
        $LiveProjectSubTasks = LiveProjectSubTasks::with('SubSubTasks')->find($sub_task_id);
        if(!is_null($LiveProjectSubTasks->SubSubTasks)) {
            $LiveProjectSubTasks->SubSubTasks()->delete();
        }
        $LiveProjectSubTasks->delete();
        return response()->json([
            "status" => true
        ]);
    }

    public function set_progress(Request $request, $project_id)
    {
        $result = $this->LiveProjectRepository->task_status_update_and_index($project_id,$request); 
        return response()->json([
            "status" => $result
        ]);
    }
}