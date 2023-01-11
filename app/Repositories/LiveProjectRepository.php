<?php

namespace App\Repositories;

use App\Interfaces\LiveProjectInterFace;
use App\Models\LiveProjectGranttLink;
use App\Models\LiveProjectGranttTask;
use App\Models\LiveProjectSubSubTasks;
use App\Models\LiveProjectSubTasks;
use App\Models\LiveProjectTasks;
use App\Models\Project;
use Illuminate\Support\Facades\Log;

class LiveProjectRepository implements LiveProjectInterFace
{
    public $projectModel;
    public $LiveProjectGranttTask;
    public $LiveProjectGranttLink;


    function __construct(Project $projectModel, LiveProjectGranttTask $LiveProjectGranttTask,LiveProjectGranttLink $LiveProjectGranttLink)
    {
        $this->projectModel = $projectModel;
        $this->LiveProjectGranttTask = $LiveProjectGranttTask;
        $this->LiveProjectGranttLink = $LiveProjectGranttLink;
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
        $wizard_menus = config('live-project.wizard_menus'); 
        return view('live-projects.index', compact('wizard_menus', "project", $project)); 
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
        $task =  $this->LiveProjectGranttTask->find($task_id)->update([
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
        $LiveProjectSubSubTasks = LiveProjectSubSubTasks::find($request->sub_task_id);
        $LiveProjectSubSubTasks->update([
            "status" => $request->status,
        ]);
        $tasks = LiveProjectSubSubTasks::where('sub_task_id',$LiveProjectSubSubTasks->sub_task_id)->get();
        $sub_sub_task_progress = 0;
        foreach ($tasks as $sub_sub_task) {
            if ($sub_sub_task->status == 1) {
                $sub_sub_task_progress++;
            }
        }
        $per_task_percentage     = 100 / count($tasks);
        $sub_task_progress_count = $sub_sub_task_progress * $per_task_percentage;

        LiveProjectSubTasks::find($request->task_id)->update([
            "progress_percentage" => $sub_task_progress_count,
        ]);
 
        $project = $this->projectModel->with('LiveProjectTasks','LiveProjectTasks.SubTasks')->find($project_id);
         
        foreach ($project->LiveProjectTasks as $key => $task) { 
            if(count($task->SubTasks) > 0) {
                $sub_task_new_count = 0;
                foreach ($task->SubTasks as $key => $sub_task) {
                    $sub_task_new_count += $sub_task->progress_percentage;
                } 
                $task->update([
                    'progress_percentage' => $sub_task_new_count / count($task->SubTasks)
                ]);
            }
        }
        // / $sub_task_progress_count
        return true;
    }
}