<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Models\Customer;
use Response;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
// use App\Models\GanttChart;
use App\Models\CostGanttTask;
use App\Models\CostGanttLink;


class GanttChartController extends Controller
{
    
    
    public function gantt_chart_single_view()
    {
        return view('admin.pages.gantt-chart');
    }
    
    // public function getData()    {
    //     // dd("get");
    //     $data   =    GanttChart::where('status','=','1')
    //                 ->select('id','text','start_date','open','duration','progress','parent')
    //                 ->get();
    //     return response()->json(['data'=>$data]);
    // }
    // public function storeData(Request $r) {  
    //     // echo $r->all();
    //     $data = new GanttChart();

    //     $data   ->  start_date  =   $r->start_date;
    //     // $data   ->  end_date    =   $r->end_date;
    //     $data   ->  text        =   $r->text;
    //     $data   ->  duration    =   $r->duration;
    //     $data   ->  progress    =   $r->progress;
    //     $data   ->  parent      =   $r->parent;
    //     $data   ->  status      =   1;

    //     $data->save();
 
    //     return response()->json([
    //         "action"=> "inserted",
    //         "taskid" => $data->id
    //     ]);
    // }
    // public function updateData(Request $r, $id) {
    //     // dd("ddd");
    //     $data   =   GanttChart::find($id);
    //     $data   ->  start_date  =   $r->start_date;
    //     // $data   ->  end_date    =   $r->end_date;
    //     $data   ->  text        =   $r->text;
    //     $data   ->  duration    =   $r->duration;
    //     $data   ->  progress    =   $r->progress;
    //     $data   ->  parent      =   $r->parent;
    //     $data   ->  status      =   1;

    //     $data->save();
 
    //     return response()->json([
    //         "action"=> "updated"
    //     ]);
    // }
    // public function deleteData(Request $r, $id) {
    //     // dd("ddd");
    //     $data   =   GanttChart::find($id);
    //     $data    ->  delete();
 
    //     return response()->json([
    //         "action"=> "deleted"
    //     ]);
    // }
   
    public function get(){
        $tasks = new CostGanttTask();
        $links = new CostGanttLink();
 
        return response()->json([
            "data" => $tasks->all(),
            "links" => $links->all()
        ]);
    }
        
    
}
