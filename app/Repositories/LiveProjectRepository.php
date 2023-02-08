<?php

namespace App\Repositories;

use App\Interfaces\LiveProjectInterFace; 
use App\Models\LiveProjectGranttLink;
use App\Models\LiveProjectGranttTask;
use App\Models\LiveProjectSubSubTasks;
use App\Models\LiveProjectSubTasks;
use App\Models\LiveProjectTasks;
use App\Models\Project; 
use App\Repositories\IssuesRepository;

class LiveProjectRepository implements LiveProjectInterFace
{
    public $projectModel;
    public $LiveProjectGranttTask;
    public $LiveProjectGranttLink;
    public $LiveProjectTasks;
    public $LiveProjectSubTasks;
    public $LiveProjectSubSubTasks;
    public $IssuesRepository;
    
    function __construct(
        Project $projectModel, 
        LiveProjectGranttTask $LiveProjectGranttTask,
        LiveProjectGranttLink $LiveProjectGranttLink,
        LiveProjectTasks $LiveProjectTasks,
        LiveProjectSubTasks $LiveProjectSubTasks,
        LiveProjectSubSubTasks $LiveProjectSubSubTasks,
        IssuesRepository $IssuesRepository
    )
    {
        $this->projectModel           = $projectModel;
        $this->LiveProjectGranttTask  = $LiveProjectGranttTask;
        $this->LiveProjectGranttLink  = $LiveProjectGranttLink;
        $this->LiveProjectTasks       = $LiveProjectTasks;
        $this->LiveProjectSubTasks    = $LiveProjectSubTasks;
        $this->LiveProjectSubSubTasks = $LiveProjectSubSubTasks;
        $this->IssuesRepository = $IssuesRepository;
    }
    public function wizard_tabs_index($menu_type,$project_id)
    {
        switch ($menu_type) {
            case 'task-list': 
                $project = $this->projectModel->with('LiveProjectTasks','Customer')->find($project_id);
                break;
            default:
                $project = $this->projectModel->with('Customer')->find($project_id);
                break;
        }
        session()->put('current_project', $project);
        session()->put('menu_type', $menu_type);
        $wizard_menus = config('live-project.wizard_menus');  
        return view('live-projects.index', compact('wizard_menus', "project", $project)); 
    }
    public function wizard_tabs_store($request,$menu_type,$project_id)
    {
        if($menu_type == 'issues') {
            return $this->IssuesRepository->store($request,$project_id);
        }
        return false;
    }
    public function get_milestones($project_id) // Project_id
    {
        try {
            $project = $this->projectModel->with('GranttTasks', 'GranttLinks')->find($project_id);
            return response([
                "status" => true,
                "data" => $project->GranttTasks->toArray(),
                "links" => $project->GranttLinks->toArray(),
            ]);
        } catch (\Throwable $th) {
            return response([
                "status" => false
            ]);
        }
    }
    public function store_milestones($project_id, $request)
    {
        $task =  $this->LiveProjectGranttTask->create([
            "project_id" => $project_id,
            "text"       => $request->text,
            "start_date" => $request->start_date,
            "duration"   => $request->duration,
            "progress"   => $request->has("progress") ? $request->progress : 0,
            "parent"     => $request->parent,
            "type"       => $request->has("type") ? $request->type : 0,
        ]);

        return response()->json([
            "action"    =>  "inserted",
            "tid"       =>  $task->id
        ]);
    }
    public function update_milestones($project_id,$task_id,$request)
    {
        $this->LiveProjectGranttTask->find($task_id)->update([
            "text"       => $request->text,
            "start_date" => $request->start_date,
            "duration"   => $request->duration,
            "progress"   => $request->has("progress") ? $request->progress : 0,
            "parent"     => $request->parent,
            "type"       => $request->has("type") ? $request->type : 0,
        ]);

        return response()->json([
            "action"    =>  "Updated",
            "tid"       =>  $task_id
        ]);
    }
    public function destroy_milestones($task_id){

        $this->LiveProjectGranttTask->find($task_id)->delete();
 
        return response()->json([
            "action"    =>  "deleted"
        ]);
    }
    public function store_milestones_link($project_id, $request)
    {
        $link = $this->LiveProjectGranttLink->create([
            "project_id" => $request->project_id,
            "type" => $request->type,
            "source" => $request->source,
            "target" => $request->target,
        ]);
        return response()->json([
            "action"=> "inserted",
            "tid" => $link->id
        ]);
    }
    public function destroy_milestones_link($project_id,$link_id)
    {
        $this->LiveProjectGranttLink->find($link_id)->delete();
        return response()->json([
            "action"    =>  "deleted"
        ]);
    }

    public function task_list_index($id)
    {
        $project = $this->projectModel->with('LiveProjectTasks','LiveProjectTasks.SubTasks','LiveProjectTasks.SubTasks.SubSubTasks')->find($id);
        return view('live-projects.templates.tasks-list',compact('project'));
    }

    public function task_status_update_and_index($project_id,$request)
    { 
        $update_status = $this->LiveProjectSubSubTasks->find($request->sub_task_id);
        $update_status->update(["status" => $request->status]);
        return $this->getSubTaskProgress($update_status->sub_task_id);
    } 

    public function get_sub_task_view($task_id)
    {
        $total_sub_task_percentage = 0;
        $task = $this->LiveProjectTasks->with('SubTasks','SubTasks.SubSubTasks')->find($task_id);
        foreach($task->SubTasks as $sub_task) {
            if(count($sub_task->SubSubTasks) > 0) {
                $total_sub_task_percentage += $sub_task->progress_percentage;
            }
            $completed_sub2_tasks = 0;
            foreach ($sub_task->SubSubTasks as $sub_sub_task) { 
                if ($sub_sub_task->status == 1) {
                    $completed_sub2_tasks ++;
                }
            }
            $per_task_percentage     = 100 / count($sub_task->SubSubTasks);
            $sub_task_progress_count = $completed_sub2_tasks * $per_task_percentage;
            $sub_task->update([
                'progress_percentage' => $sub_task_progress_count
            ]);
        }
        $task->update([
            'progress_percentage' => $total_sub_task_percentage / count($task->SubTasks)
        ]);
        return view('live-projects.templates.sub-task-model',compact('task'));
    }
    public function getSubTaskProgress($sub_task_id)
    {
        $LiveProjectSubSubTasks = $this->LiveProjectSubTasks->with('SubSubTasks')->find((int) $sub_task_id);
        $completed_sub2_tasks = 0;
        foreach ($LiveProjectSubSubTasks->SubSubTasks as $sub_sub_task) { 
            if ($sub_sub_task->status == 1) {
                $completed_sub2_tasks ++;
            }
        }
        $per_task_percentage     = 100 / count($LiveProjectSubSubTasks->SubSubTasks);
        $sub_task_progress_count = $completed_sub2_tasks * $per_task_percentage;
        $LiveProjectSubSubTasks->update([
            'progress_percentage' => $sub_task_progress_count
        ]);  
       
        return generateProgressBar($LiveProjectSubSubTasks->progress_percentage);
    }
}