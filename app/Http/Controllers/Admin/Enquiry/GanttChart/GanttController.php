<?php

namespace App\Http\Controllers\Admin\Enquiry\GanttChart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Gantt;
use App\Models\GanttTask;
use App\Models\ganttLink;

use DB;
use App\Models\GanttChart;

class GanttController extends Controller
{
    public function get(){
        $tasks = new GanttTask();
        $links = new ganttLink();
 
        return response()->json([
            "data" => $tasks->all(),
            "links" => $links->all()
        ]);
    }
}