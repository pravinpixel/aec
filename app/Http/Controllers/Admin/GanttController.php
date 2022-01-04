<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Gantt;

class GanttController extends Controller
{
    public function getData()    {
        $data   =    Gantt::where('status','=','1')
                    ->select('id','text','start_date','open','duration','progress','parent')
                    ->get();
        return response()->json(['data'=>$data]);
    }
    public function storeData(Request $r) { 

        $data = new Gantt();

        $data   ->  start_date  =   $r->start_date;
        $data   ->  text        =   $r->text;
        $data   ->  duration    =   $r->duration;
        $data   ->  progress    =   $r->progress;
        $data   ->  parent      =   $r->parent;
        $data   ->  status      =   1;
        $data   ->  created_by  =   1;

        $data->save();

        return response()->json([
            "action"=> "inserted",
            "taskid" => $data->id
        ]);
    }
   
    public function updateData(Request $r, $id) {
        $data   =   Gantt::find($id);
        $data   ->  start_date  =   $r->start_date;
        $data   ->  text        =   $r->text;
        $data   ->  duration    =   $r->duration;
        $data   ->  progress    =   $r->progress;
        $data   ->  parent      =   $r->parent;
        $data   ->  status      =   1;
        $data   ->  created_by  =   1;

        $data->save();
 
        return response()->json([
            "action"=> "updated"
        ]);
    }
    public function deleteData(Request $r, $id) {
        $data   =   Gantt::find($id);
        $data    ->  delete();
 
        return response()->json([
            "action"=> "deleted"
        ]);
    }
}
 