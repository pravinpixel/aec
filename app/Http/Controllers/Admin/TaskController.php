<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
		$task->enqid = $request->enqid;
		$task->etype = $request->etype;
        $task->text = $request->text;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
		$task->render = $request->render;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;
		$task->color = $request->color;
		$task->textColor = $request->textColor;
		$task->unscheduled = $request->unscheduled;
        $task->save();
 
        return response()->json([
            "action"=> "inserted",
            "tid" => $task->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //$task = Task::find($id);
		$task->enqid = $request->enqid;
		$task->etype = $request->etype;
        $task->text = $request->text;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
		$task->render = $request->render;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;
		$task->color = $request->color;
		$task->color = $request->color;
		$task->textColor = $request->textColor;
		$task->unscheduled = $request->unscheduled;
        $task->save();
 
        return response()->json([
            "action"=> "updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
       //  $task = Task::find($id);
        $task->delete();
 
        return response()->json([
            "action"=> "deleted"
        ]);
    }
}
