<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repositories\LiveProjectRepository;
use Illuminate\Http\Request;
class LiveProjectController extends Controller
{
    protected $LiveProjectRepository;

    public function __construct(LiveProjectRepository $LiveProjectRepository){
        $this->LiveProjectRepository  = $LiveProjectRepository;
    }
    
    public function index($menu_type,$id=null)
    { 
        $project = Project::find($id);
        session()->put('current_project', $project);
        $wizard_menus = config('live-project.wizard_menus'); 
        return view('live-projects.index', compact('wizard_menus','project'));
    }

    public function store(Request $reuqest, $menu_type ,$id)
    {
        return redirect()->route('live-project.menus-index',[
            "menu_type" => $reuqest->menu_type,
            "id" => $id
        ]);
    }

    public function milestones_index($project_id)
    {
        return $this->LiveProjectRepository->get_milestones($project_id);
    }

    public function store_milestones(Request $request, $project_id)
    {
        return $this->LiveProjectRepository->store_milestones($project_id,$request);
    }

    public function update_milestones(Request $request, $project_id,$task_id)
    {
        return $this->LiveProjectRepository->update_milestones($project_id,$task_id,$request);
    }
    public function destroy_milestones($project_id,$task_id)
    {
        return $this->LiveProjectRepository->destroy_milestones($task_id);
    }
    public function store_milestones_link(Request $request,$project_id)
    {
        return $this->LiveProjectRepository->store_milestones_link($project_id,$request);
    }
    public function destroy_milestones_link($project_id,$link_id)
    {
        return $this->LiveProjectRepository->destroy_milestones_link($project_id,$link_id);
    }
}
