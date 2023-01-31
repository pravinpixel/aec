<?php
namespace App\Repositories;
use App\Models\Issues;
use App\Models\Project;

class IssuesRepository {
    public $Issues,$Project;
    function __construct(Issues $issues,Project $Project) {
        $this->Issues = $issues;
        $this->Project = $Project;
    }
    public function store($request,$id)
    {
        return $this->Project->findOrFail($id)->Issues()->create([
            'title'         => $request->title,
            'description'   => $request->descriptions,
            'type'          => $request->assign_type,
            'request_id'    => $request->requester,
            'request_name'  => getEmployeeById($request->requester)->display_name,
            'assignee_id'   => $request->assignee,
            'assignee_name' => $request->assign_type == 'INTERNAL' ? getEmployeeById($request->assignee)->display_name : getCustomerById($request->assignee)->full_name,
            'priority'      => $request->priority,
            'due_date'      => $request->due_date,
            'tags'          => json_encode($request->tags),
        ]);
    }
}