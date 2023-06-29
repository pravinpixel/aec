<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\View\Components\enquiryQuickView;
use App\View\Components\projectQuickView;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function enquiry_quick_view(Request $request)
    {
        $enquiry =  new enquiryQuickView($request->enquiry_id, $request->preview_table ,$request->chat_box ?? 1);
        return $enquiry->render();
    }
    public function project_quick_view(Request $request)
    {
        $project =  new projectQuickView($request->project_id, $request->preview_table ,$request->chat_box ?? 1);
        return $project->render();
    }
    public function proposal_quick_view($id)
    {
        $enquiry = Enquiry::with('MailedEnquiryProposal')->find($id); 
        return view('customer.proposal.view', compact('id','enquiry'));
    }
}
