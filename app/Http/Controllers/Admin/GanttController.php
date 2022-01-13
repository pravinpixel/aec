<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Gantt;
use App\Models\GanttTask;
use App\Models\ganttLink;

use DB;
use App\Models\GanttChart;

class GanttController extends Controller
{
    // public function getData()    {
    //     $data   =    GanttChart::where('status','=','1')->select(
    //                                                             'id',
    //                                                             'text',
    //                                                             'start_date',
    //                                                             'open',
    //                                                             'duration',
    //                                                             'progress',
    //                                                             'parent',
    //                                                             'end_date',
    //                                                             'target',
    //                                                             'source',
    //                                                             'type',
    //                                                         )->get();
    //     return response()->json(['data'=>$data]);
    // }
    // public function storeData(Request $r) { 

    //     $data = new GanttChart();

    //     $data   ->  start_date  =   $r->start_date;
    //     $data   ->  end_date    =   $r->end_date;
    //     $data   ->  type        =   $r->type;
    //     $data   ->  target      =   $r->target;
    //     $data   ->  source      =   $r->source;


    //     $data   ->  text        =   $r->text;
    //     $data   ->  duration    =   $r->duration;
    //     $data   ->  progress    =   $r->progress;
    //     $data   ->  parent      =   $r->parent;
    //     $data   ->  status      =   1;
    //     $data   ->  created_by  =   1;

    //     $data->save();

    //     return response()->json([
    //         "action"=> "inserted",
    //         "taskid" => $data->id
    //     ]);
    // }
    // public function storeLink(Request $r) { 

    //     $data   =   GanttChart::find($r->source);
    //     $data   ->  type        =   $r->type;
    //     $data   ->  target      =   $r->target;
    //     $data   ->  source      =   $r->source;
    //     $data->save();

    //     return response()->json([
    //         "action"=> "inserted",
    //         "taskid" => $data->id
    //     ]);
    // }
   
    // public function updateData(Request $r, $id) {
    //     $data   =   GanttChart::find($id);
    //     $data   ->  start_date  =   $r->start_date;
    //     $data   ->  end_date    =   $r->end_date;
    //     $data   ->  type        =   $r->type;
    //     $data   ->  target      =   $r->target;
    //     $data   ->  source      =   $r->source;
    //     $data   ->  text        =   $r->text;
    //     $data   ->  duration    =   $r->duration;
    //     $data   ->  progress    =   $r->progress;
    //     $data   ->  parent      =   $r->parent;
    //     $data   ->  status      =   1;
    //     $data   ->  created_by  =   1;

    //     $data->save();
 
    //     return response()->json([
    //         "action"=> "updated"
    //     ]);
    // }
    // public function deleteData(Request $r, $id) {
    //     $data   =   GanttChart::find($id);
    //     $data    ->  delete();
 
    //     return response()->json([
    //         "action"=> "deleted"
    //     ]);
    // }
    public function get(){
        $tasks = new GanttTask();
        $links = new ganttLink();
 
        return response()->json([
            "data" => $tasks->all(),
            "links" => $links->all()
        ]);
    }
} 