<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Models\Customer;
use Response;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\GanttChart;


class GanttChartController extends Controller
{
    
    
    public function gantt_chart_single_view()
    {
        return view('admin.pages.gantt-chart');
    }
    
    public function getData()    {
        // dd("get");
        $data   =    GanttChart::where('status','=','1')
                    ->select('id','text','start_date','open','duration','progress','parent')
                    ->get();
        return response()->json(['data'=>$data]);
    }
    public function storeData(Request $r) {  
        // echo $r->all();
        $data = new GanttChart();

        $data   ->  start_date  =   $r->start_date;
        // $data   ->  end_date    =   $r->end_date;
        $data   ->  text        =   $r->text;
        $data   ->  duration    =   $r->duration;
        $data   ->  progress    =   $r->progress;
        $data   ->  parent      =   $r->parent;
        $data   ->  status      =   1;

        $data->save();
 
        return response()->json([
            "action"=> "inserted",
            "taskid" => $data->id
        ]);
    }
    public function updateData(Request $r, $id) {
        // dd("ddd");
        $data   =   GanttChart::find($id);
        $data   ->  start_date  =   $r->start_date;
        // $data   ->  end_date    =   $r->end_date;
        $data   ->  text        =   $r->text;
        $data   ->  duration    =   $r->duration;
        $data   ->  progress    =   $r->progress;
        $data   ->  parent      =   $r->parent;
        $data   ->  status      =   1;

        $data->save();
 
        return response()->json([
            "action"=> "updated"
        ]);
    }
    public function deleteData(Request $r, $id) {
        // dd("ddd");
        $data   =   GanttChart::find($id);
        $data    ->  delete();
 
        return response()->json([
            "action"=> "deleted"
        ]);
    }
    // public function ganttChartForm(Request $request)
    // {
    //     print_r("1111");die;
    //     // return json_decode($request->datas);
    //     // print_r($request->all());die();
    //     // return $request->gantt_text;
    //   if($request->ganttchartKey){
    //     //   return "if";
    //     $data = GanttChart::where('id',$request->ganttchartKey)->first();
    //     $data->text =  $request['gantt_text'];
    //     $data->start_date =date("d-m-Y", strtotime($request['gantt_start_date']));
    //     $data->duration = $request['gantt_duration'];
    //     $data->progress = $request['gantt_progress'];
    //     // $data->open = "true";
    //     // $data->status = 1;
    //     $data->save();
    //   }
    //   else{
    //     // return "else";
    //     $data = new GanttChart();
    //     $data->text =  $request['gantt_text'];
    //     $data->start_date =date("d-m-Y", strtotime($request['gantt_start_date']));
    //     $data->duration = $request['gantt_duration'];
    //     $data->progress = $request['gantt_progress'];
    //     $data->open = "true";
    //     $data->status = 1;
    //     $data->save();
    //   }
        
 
    //     return response()->json(['message'=>'success']);
        
    // }
    // public function ganttChart(Request $request)
    // {  print_r("1111");die;
 
    //     // if ($request->ajax()) {

    //         // $data = GanttChart::where('status','=','1')->select('id','text','start_date','open','duration','progress','parent')->get();
    //         $model = GanttChart::where('status','=','1')->select('id','text','start_date','open','duration','progress','parent');
             
    //         // return response(['tasks'=>$data]);
    //         return DataTables::eloquent($model)
          
    //             ->addColumn('action', function($model){
    //                 $actionBtn = '<a class="edit editGanttChart btn btn-primary btn-sm" data-gantt-chart-id="'.$model->id.'" ><i class="fa fa-edit"></i></a> <a class="delete delete_GanttChart btn btn-primary btn-sm" data-gantt-chart-id="'.$model->id.'" ><i class="fa fa-trash"></i></a>';
                    

    //                 return $actionBtn;
    //             })
    //             ->toJson();
            
            
    // }
    // public function createGanttChart(Request $request)    {
          
    //     dd("dd");
    //     $task = new GanttChart();
 
    //     $task->text = $request->text;
    //     $task->start_date = $request->start_date;
    //     $task->duration = $request->duration;
    //     $task->progress = $request->has("progress") ? $request->progress : 0;
    //     $task->parent = $request->parent;
    //     $task->statsu = 1;
    //     $accessToken = $request->createToken('authToken')->accessToken;
 
    //     $task->save();
 
    //     return response()->json([
    //         "action"=> "inserted",
    //         "tid" => $task->id
    //     ]);
        
    // }
    // public function updateGanttChart($id, Request $request)
    // {
    //     # code...
    //     print_r("1111");die;
    //     $task = GanttChart::find($id);
 
    //     $task->text = $request->text;
    //     $task->start_date = $request->start_date;
    //     $task->duration = $request->duration;
    //     $task->progress = $request->has("progress") ? $request->progress : 0;
    //     $task->parent = $request->parent;
 
    //     $task->save();
 
    //     return response()->json([
    //         "action"=> "updated"
    //     ]);
    // }
    // public function deleteGanttChart($id){
    //     print_r("1111");die;
    //     $task = GanttChart::find($id);
    //     $task->statsu = 1;
    //     $task->delete();
 
    //     return response()->json([
    //         "action"=> "deleted"
    //     ]);
    // }
    //     public function ganttChartEdit(Request $request)
    //     {
    //         print_r("1111");die;
    //         $data = GanttChart::where('id',$request->id)->first();
    //         return response()->json(['data'=>$data]);
    //     }
    //     public function ganttChartDelete(Request $id)
    //     {
    //         // return $id;
    //         print_r("1111");die;
    //         $data = GanttChart::find($id->id);
    //         $data->status = 0;
    //         $data->save();
    //         $data->delete();
    //         return response()->json(['message'=>'successfully deleted']);
    //     }
        
    
}
