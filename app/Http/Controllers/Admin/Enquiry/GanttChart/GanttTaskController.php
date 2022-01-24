<?php

namespace App\Http\Controllers\Admin\Enquiry\GanttChart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GanttTask;


class GanttTaskController extends Controller
{
    public function store(Request $request){
 
        $task = new GanttTask();
 
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
 
    public function update($id, Request $request){
        $task = GanttTask::find($id);
 
        $task->text         = $request->text;
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
 
    public function destroy($id){
        $task   =   GanttTask::find($id);
        $task   ->  delete();
 
        return response()->json([
            "action"    =>  "deleted"
        ]);
    }
} 