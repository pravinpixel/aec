<?php

namespace App\Http\Controllers;

use App\Models\EnquiryProposal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EnquiryProposalController extends Controller
{
    public $EnquiryProposal;
    function __construct(EnquiryProposal $EnquiryProposal)
    {
        $this->EnquiryProposal = $EnquiryProposal;
    }
    public function show($id, $status)
    {
        $proposal = $this->EnquiryProposal->find($id);
        return view('admin.enquiry.wizard.proposal-templates.view-edit', compact('proposal', 'status'));
    }
    public function duplicate($id)
    {
        $proposal = $this->EnquiryProposal->find($id); 
        $version = 'R' . (count($proposal->child) + 1);
        $content  = str_replace(['R0', 'R1', 'R2', 'R3', 'R4', 'R5', 'R6', 'R7', 'R8', 'R9', 'R10', 'R11'], $version, $proposal->content);
        $newproposal = $this->EnquiryProposal->create([
            "content"         => $content,
            "version"         => $version,
            "created_by"      => AecAuthUser()->full_name,
            'enquiry_id'      => $proposal->enquiry_id,
            'title'           => $proposal->title,
            'admin_status'    => "AWAITING",
            'customer_status' => 'NOT_SENT',
            'parent' => 0
        ]);
        $proposal->update([
            'admin_status' => 'OBSOLETE',
            'parent' => $newproposal->id
        ]);
        return view('admin.enquiry.wizard.proposal-table', compact('proposal'));
    }
    public function update($id, Request $request) {
        $result = $this->EnquiryProposal->find($id)->update(['content' => $request->content]);
        if($result) {
            return response([
                'status' => true,
                'message' => 'Changes Saved!'
            ]);
        }
    }
    public function download($id) {
        $Proposal = $this->EnquiryProposal->find($id);  
        return Pdf::loadHTML( $Proposal->content)->setPaper('A4')->download($Proposal->title.'.pdf');
    }
}
