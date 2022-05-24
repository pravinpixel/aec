<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\MailTemplate;
use App\Models\Admin\PropoalVersions as ProposalVersions ;
use App\Models\Enquiry;
use App\Repositories\CustomerEnquiryRepository;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    protected $customerEnquiryRepo;
    public function __construct(CustomerEnquiryRepository $customerEnquiryRepository){
        $this->customerEnquiryRepo  = $customerEnquiryRepository;
    }

    public function index($id)
    {
        $data['proposals'] = $this->customerEnquiryRepo->getCustomerProPosal($id);
        // dd($data);
        return view('customer.proposal.index', with($data));
    }

    public function approveOrDeny(Request $request, $type)
    {
        $enquiry_id  = $request->input('id');
        $proposal_id = $request->input('pid');
        $version_id  = $request->input('vid');
        $enquiry     = Enquiry::find($enquiry_id);
        if($type == 0) {
            $enquiry->project_status = "Unattended";
            $enquiry->customer_response = 2;
            $enquiry->save(); 
            $this->addComment($enquiry_id, $request); 
            return response(['status' => true, 'msg' => __('enquiry.denied')]);
        } 
        if($type == 1){ 
            $enquiry->project_status = "Active";
            $enquiry->customer_response = 1;
            $enquiry->save();
            MailTemplate::where('enquiry_id', $enquiry_id)->update(['proposal_status' => 'obsolete']);
            ProposalVersions::where('enquiry_id', $enquiry_id)->update(['proposal_status' => 'obsolete']);      
            if( $version_id  != 0)    {
                ProposalVersions::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id, 'id' => $version_id])
                                ->update(['proposal_status' => 'approved']);  
            } else {
                MailTemplate::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id])
                                ->update(['proposal_status' => 'approved']);
            }           
            return response(['status' => true, 'msg' => __('enquiry.approved')]);
        }
    }

    public function addComment($enquiry_id, $request)
    {
       
        $proposal_id    =   $request->input('pid');
        $version_id     =   $request->input('vid');
        $comment        =   $request->input('comment');
        if($version_id == 0) {
            $proposal = MailTemplate::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id])->first();
            $proposal->comment = $comment;
            $proposal->proposal_status = 'denied';
            $proposal->save();
        } else {
            $proposalVersion = ProposalVersions::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id, 'id'=>  $version_id])->first();
            $proposalVersion->comment = $comment;
            $proposalVersion->proposal_status = 'denied';
            $proposalVersion->save();
        }
    }

    public function getProposal(Request $request)
    {
        $proposal_id    =   $request->input('pid');
        $version_id     =   $request->input('vid');
        if($version_id == 0) {
            $proposal           =   MailTemplate::where('proposal_id','=',$proposal_id)->latest()->first();
        } else {
            $proposal   =   ProposalVersions::where(['proposal_id'=> $proposal_id, 'id'=> $version_id ])->latest()->first();
        }
        return $proposal;
    }

}
