<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectGranttTask;
use Illuminate\Http\Request;

class ProjectGranttChartTaskController extends Controller
{
    public function store($id, Request $request){
 
        $task = new ProjectGranttTask();
        $task->project_id   = $id;
        $task->text         = $request->text;
        $task->start_date   = $request->start_date;
        $task->duration     = $request->duration;
        $task->progress     = $request->has("progress") ? $request->progress : 0;
        $task->parent       = $request->parent;
        $task->type         = $request->has("type") ? $request->type : 0;
        
        $task->save();
 
        return response()->json([
            "action"    =>  "inserted",
            "tid"       =>  $task->id
        ]);
    }
 
    public function update($project_id = null, $task_id, Request $request){
 
        $task = ProjectGranttTask::find($task_id);
 
        $task->text         = $request->text ?? $task->text;
        $task->start_date   = $request->start_date;
        $task->duration     = $request->duration;
        $task->progress     = $request->has("progress") ? $request->progress : 0;
        $task->parent       = $request->parent;
        $task->type         = $request->has("type") ? $request->type : 0;
 
        $task->save();
 
        return response()->json([
            "action"    =>  "updated"
        ]);
    }
 
    public function destroy($id = null, $task_id){

        $task   =   ProjectGranttTask::find($task_id);
        $task   ->  delete();
 
        return response()->json([
            "action"    =>  "deleted"
        ]);
    }
}