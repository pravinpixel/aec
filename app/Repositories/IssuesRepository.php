<?php
namespace App\Repositories;
use App\Models\Issues;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class IssuesRepository {
    public $Issues,$Project;
    function __construct(Issues $issues,Project $Project) {
        $this->Issues = $issues;
        $this->Project = $Project;
    }
    public function store($request,$id)
    { 
        $Issues =  $this->Project->findOrFail($id); 
        $created_issue = $Issues->Issues()->create([
            "issue_id" =>  issue_id(),
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
        if($request->has('attachments')) {
            foreach ($request->attachments as $key => $attachment) { 
                $created_issue->IssuesAttachments()->create([
                    "file_path" => Storage::put('issues',$attachment)
                ]);
            }
        }
        return true;
    }
}