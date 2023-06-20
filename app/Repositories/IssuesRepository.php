<?php
namespace App\Repositories;

use App\Mail\issueCreateMail;
use App\Models\Issues;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
class IssuesRepository {
    public $Issues,$Project;
    function __construct(Issues $issues,Project $Project) {
        $this->Issues = $issues;
        $this->Project = $Project;
    }
    public function store($request,$id)
    {
        $Issues = $this->Project->findOrFail($id); 
        $created_issue = $Issues->Issues()->create([
            "issue_id"      =>  'TKT/' . date('Y') . '/' . (count($Issues->Issues) + 1),
            'title'         => $request->title,
            'description'   => $request->descriptions,
            'type'          => $request->assign_type,
            'request_id'    => $request->requester,
            'request_name'  => getEmployeeById($request->requester)->display_name,
            'assignee_id'   => $request->assignee,
            'assignee_name' => $request->assign_type === 'INTERNAL' ? getEmployeeById($request->assignee)->first_name : getCustomerById($request->assignee)->full_name,
            'assignee_role' => $request->assign_type === 'INTERNAL' ? strtoupper(getEmployeeById($request->assignee)->role->slug) : 'CUSTOMER',
            'requester_role' => AuthUser(),
            'priority'      => $request->priority,
            'due_date'      => $request->due_date,
            'tags'          => json_encode($request->tags),
        ]);
        if((bool) $request->send_mail) {
            $customer = getCustomerByProjectId($created_issue->project_id);
            sendMail(new issueCreateMail(), [
                "email"        => $customer->email,
                "project_name" => $Issues->project_name,
                "name"         => $customer->full_name,
                "issue_id"     => $created_issue->issue_id,
                'request_name' => getEmployeeById($request->requester)->display_name
            ]);
        }
        if($request->has('attachments')) {
            foreach ($request->attachments as $key => $attachment) { 
                $created_issue->IssuesAttachments()->create([
                    "file_path" => Storage::put('issues',$attachment)
                ]);
            }
        }
        return true;
    }
    public function update($request,$id) {
        $issue =  $this->Issues->findOrFail($request->issue_id);
        $issue->update([
            'title'         => $request->title,
            'description'   => $request->descriptions,
            'type'          => $request->assign_type,
            'request_id'    => $request->requester,
            'request_name'  => getEmployeeById($request->requester)->display_name,
            'priority'      => $request->priority,
            'due_date'      => $request->due_date,
            'tags'          => json_encode($request->tags),
        ]); 
        if($request->has('attachments')) {
            foreach( $issue->IssuesAttachments as $old_attachment ) {
                Storage::delete($old_attachment->file_path);
            }
            $issue->IssuesAttachments()->delete();
            foreach ($request->attachments as $attachment) { 
                $issue->IssuesAttachments()->create([
                    "file_path" => Storage::put('issues',$attachment)
                ]);
            }
        }
        return true;
    }
}