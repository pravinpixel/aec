<?php

namespace App\Repositories;

use App\Interfaces\LiveProjectInterFace;
use App\Models\LiveProjectGranttTask;
use App\Models\Project;

class LiveProjectRepository implements LiveProjectInterFace
{
    public $projectModel;
    public $LiveProjectGranttTask;

    function __construct(Project $projectModel, LiveProjectGranttTask $LiveProjectGranttTask)
    {
        $this->projectModel = $projectModel;
        $this->LiveProjectGranttTask = $LiveProjectGranttTask;
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
}
