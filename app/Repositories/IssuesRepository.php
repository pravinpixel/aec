<?php

namespace App\Repositories;

use App\Mail\issueCreateMail;
use App\Models\Issues;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class IssuesRepository
{
    public $Issues, $Project;
    function __construct(Issues $issues, Project $Project)
    {
        $this->Issues = $issues;
        $this->Project = $Project;
    }
    public function store($request, $id)
    {
        // dd($request->assign_type);
        $Issues = $this->Project->findOrFail($id);
        $created_issue = $Issues->Issues()->create([
            "issue_id"       => 'TKT/' . date('Y') . '/' . (count($Issues->Issues) + 1),
            'title'          => $request->title,
            'description'    => $request->descriptions,
            'type'           => $request->assign_type,
            'request_id'     => $request->requester,
            'request_name'   => AecUser($request->requester)->full_name,
            'assignee_id'    => $request->assignee,
            'assignee_name'  => AecUser($request->assignee)->full_name,
            'assignee_role'  => AecUser($request->assignee)->role->name,    // request->requester == id
            'requester_role' => AecUser($request->requester)->role->name,
            'priority'       => $request->priority,
            'due_date'       => $request->due_date,
            'tags'           => json_encode($request->tags)
        ]);
        if ((bool) $request->send_mail) {
            $this->sendMail($created_issue);
        }
        if ($request->has('attachments')) {
            foreach ($request->attachments as $key => $attachment) {
                $created_issue->IssuesAttachments()->create([
                    "file_path" => Storage::put('issues', $attachment)
                ]);
            }
        }
        return true;
    }
    public function sendMail($issue)
    {
        if (AecAuthUser()->Role->slug === 'aec_customer') {
            Mail::to(AecUser($issue->assignee_id)->email)->send(new issueCreateMail([
                "project_name" => $issue->Project->project_name,
                "name"         => AecUser($issue->assignee_id)->full_name,
                "issues"       => $issue,
                'request_name' => AecUser($issue->request_id)->full_name
            ]));
        } else {
            Mail::to(AecUser($issue->assignee_id)->email)
                ->cc(AecUsers(json_decode($issue->tags))->pluck('email')->toArray())
                ->send(new issueCreateMail([
                    "project_name" => $issue->Project->project_name,
                    "name"         => AecUser($issue->assignee_id)->full_name,
                    "issues"       => $issue,
                    'request_name' => AecUser($issue->request_id)->full_name
                ]));
        }
    }
    public function update($request, $id)
    {
        $issue =  $this->Issues->findOrFail($request->issue_id);
        $issue->update([
            'title'         => $request->title,
            'description'   => $request->descriptions,
            'type'          => $request->assign_type,
            'request_id'    => $request->requester,
            'request_name'  => getEmployeeById($request->requester)->full_name,
            'priority'      => $request->priority,
            'due_date'      => $request->due_date,
            'tags'          => json_encode($request->tags),
        ]);
        if ($request->has('attachments')) {
            foreach ($issue->IssuesAttachments as $old_attachment) {
                Storage::delete($old_attachment->file_path);
            }
            $issue->IssuesAttachments()->delete();
            foreach ($request->attachments as $attachment) {
                $issue->IssuesAttachments()->create([
                    "file_path" => Storage::put('issues', $attachment)
                ]);
            }
        }
        return true;
    }
}
