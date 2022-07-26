<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectGranttLink;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectGranttChartLinkController extends Controller
{
    public function store($id, Request $request){
        $link = new ProjectGranttLink();
        
        $link->project_id = $id;
        $link->type       = $request->type;
        $link->source     = $request->source;
        $link->target     = $request->target;
 
        $link->save();
 
        return response()->json([
            "action"=> "inserted",
            "tid" => $link->id
        ]);
    }
 
    public function update($id, Request $request){
        $link = ProjectGranttLink::find($id);
 
        $link->type = $request->type;
        $link->source = $request->source;
        $link->target = $request->target;
 
        $link->save();
 
        return response()->json([
            "action"=> "updated"
        ]);
    }
 
    public function destroy($id = null, $link_id){
        $link = ProjectGranttLink::find($link_id);
        $link->delete();
 
        return response()->json([
            "action"=> "deleted"
        ]);
    }
}
