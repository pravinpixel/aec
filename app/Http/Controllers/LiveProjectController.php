<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class LiveProjectController extends Controller
{
    public function index($menu_type,$id=null)
    { 
        $project = Project::find($id);
        session()->put('current_project', $project);
        $wizard_menus = config('live-project.wizard_menus'); 
        return view('live-projects.index', compact('wizard_menus','project'));
    }

    public function store(Request $request)
    {
        return redirect()->route('live-project.menus-index',["menu_type" => $request->menu_type]);
    }

    public function milestones_index($project_id)
    {
        try {
            $project = Project::with('GranttTasks','GranttLinks')->find($project_id);
            return response([
                "status" => true,
                "data" => $project->GranttTasks->toArray(),
                "links" => $project->GranttLinks->toArray(),
            ]);
        } catch (\Throwable $th) {
            return response([
                "status" => false
            ]);
        }
    }
}
