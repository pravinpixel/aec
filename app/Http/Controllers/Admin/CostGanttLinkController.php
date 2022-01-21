<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CostGanttLink;
class CostGanttLinkController extends Controller
{
    public function store(Request $request){
        $link = new CostGanttLink();
 
        $link->type = $request->type;
        $link->source = $request->source;
        $link->target = $request->target;
 
        $link->save();
 
        return response()->json([
            "action"=> "inserted",
            "tid" => $link->id
        ]);
    }
 
    public function update($id, Request $request){
        $link = CostGanttLink::find($id);
 
        $link->type = $request->type;
        $link->source = $request->source;
        $link->target = $request->target;
 
        $link->save();
 
        return response()->json([
            "action"=> "updated"
        ]);
    }
 
    public function destroy($id){
        $link = CostGanttLink::find($id);
        $link->delete();
 
        return response()->json([
            "action"=> "deleted"
        ]);
    }
}
