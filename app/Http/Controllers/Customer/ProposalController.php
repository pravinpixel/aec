<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\MailTemplate;
use App\Models\Admin\PropoalVersions as ProposalVersions;
use App\Models\Enquiry;
use App\Repositories\CustomerEnquiryRepository;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProposalController extends Controller
{
    protected $customerEnquiryRepo;

    public function __construct(
        CustomerEnquiryRepository $customerEnquiryRepository
    ){
        $this->customerEnquiryRepo  = $customerEnquiryRepository;
    }

    public function index($id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        if(empty($enquiry)) {
            Flash::error('Not found');
            return redirect(route('customers-enquiry-dashboard'));
        }
        $data['proposals'] = $this->customerEnquiryRepo->getCustomerProPosal($id);
        $latestVersion = $this->getLatestProposal($id);
        if(empty($latestVersion )) {
            Flash::error('There is no proposal found');
            return redirect(route('customers-enquiry-dashboard'));
        }
        $data['enquiry_id']      = $latestVersion->enquiry_id;
        $data['proposal_id']     = $latestVersion->proposal_id;
        $data['version_id']      = isset($latestVersion->parent_id) ? $latestVersion->id : 0;
        $data['latest_proposal'] = $latestVersion;
        return view('customer.proposal.index', with($data),compact('enquiry','id'));
    }

    public function approveOrDeny(Request $request, $type)
    {
        $enquiry_id  = $request->input('id');
        $proposal_id = $request->input('pid');
        $version_id  = $request->input('vid');
        $enquiry     = Enquiry::find($enquiry_id);
        if($type == 'change_request' || $type == 'deny') {
            $enquiry->project_status = "Unattended";
            $enquiry->customer_response = GlobalService::getProposalStatusValue($type);
            $enquiry->proposal_sharing_status = 0;
            $enquiry->save();
            $this->addComment($enquiry_id, $request, $type);
            return response(['status' => true, 'msg' => ($type == 'deny' ? __('enquiry.denied') : __('enquiry.change_request') )]);
        } 
        if($type == 'approve'){ 
            $enquiry->project_status = "Active";
            $enquiry->customer_response = 1;
            $enquiry->save();
            MailTemplate::where('enquiry_id', $enquiry_id)->update(['proposal_status' => 'obsolete']);
            ProposalVersions::where('enquiry_id', $enquiry_id)->update(['proposal_status' => 'obsolete']);      
            if( $version_id  != 0)  {
                ProposalVersions::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id, 'id' => $version_id])
                                ->update(['proposal_status' => 'approved','status' => 'approved']);  
            } else {
                MailTemplate::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id])
                                ->update(['proposal_status' => 'approved','status' => 'approved']);
            }           
            return response(['status' => true, 'msg' => __('enquiry.approved')]);
        }
    }

    public function addComment($enquiry_id, $request, $type = null)
    {
        $proposal_id    =   $request->input('pid');
        $version_id     =   $request->input('vid');
        $comment        =   $request->input('comment');
        $type           =   $type == 'deny' ? 'denied' : 'change_request';
        if($version_id == 0) {
            $proposal = MailTemplate::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id])->first();
            $proposal->comment = $comment;
            $proposal->proposal_status = $type;
            $proposal->status = $type;
            $proposal->save();
        } else {
            $proposalVersion = ProposalVersions::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id, 'id'=>  $version_id])->first();
            $proposalVersion->comment = $comment;
            $proposalVersion->proposal_status = $type;
            $proposalVersion->status = $type;
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

    public function getLatestProposal($enquiry_id)
    {
        $proposal  = ProposalVersions::where(['enquiry_id'=> $enquiry_id, 'status' => 'sent'])->latest()->first();
        if(empty($proposal)) {
            $proposal  = MailTemplate::where(['enquiry_id'=> $enquiry_id, 'status' => 'sent'])->latest()->first();
            if(empty($proposal)) {
                $proposal = ProposalVersions::where('enquiry_id', $enquiry_id)
                                            ->where('status','!=','awaiting')
                                            ->orderBy('id','desc')->first() 
                            ?? MailTemplate::where('enquiry_id', $enquiry_id)
                                            ->where('status','!=','awaiting')
                                            ->orderBy('proposal_id','desc')->first();
            }
        }
        return $proposal;
    }

}
