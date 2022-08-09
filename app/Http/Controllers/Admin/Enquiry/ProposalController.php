<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MailTemplate;
use App\Models\Admin\PropoalVersions as ProposalVersions;
use App\Models\Enquiry;
use App\Repositories\CustomerEnquiryRepository;
use App\Services\GlobalService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Laracasts\Flash\Flash;

class ProposalController extends Controller
{
    protected $customerEnquiryRepo;
    protected $documentTypeEnquiryRepo;

    public function __construct(CustomerEnquiryRepository $customerEnquiryRepository){
        $this->customerEnquiryRepo  = $customerEnquiryRepository;
    }
    public function index(Request $request, $id) 
    {
        $proposals    =   $this->customerEnquiryRepo->getCustomerProPosal($id)->groupBy('documentary_id')->toArray();
        $proposalList =  [];
        foreach($proposals as $proposalVersion){
            $versionList = [];
            foreach($proposalVersion as $version){
                $versionList[] = $version;
            }
            $root = $versionList[0] ?? null;
            if(count( $versionList ) > 1) {
                array_shift($versionList);
                $root['get_versions'] = $versionList;
                $proposalList[] = $root;
            } else {
                $proposalList[] = $root;
            }
        }
        return response($proposalList);
    }
    public function edit(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->getCustomerProPosalByID($id, $proposal_id);
    }
    public function editVersions(Request $request, $id, $proposal_id,  $Vid)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->getCustomerProPosalVersionByID($id, $proposal_id, $Vid);
    }
    public function update(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->updateCustomerProPosalByID($id, $proposal_id, $request);
    }
    public function updateVersions(Request $request, $id, $proposal_id, $Vid)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->updateCustomerProPosalVersionByID($id, $proposal_id, $request,$Vid);
    }
    public function deleteVersions(Request $request, $id, $proposal_id, $Vid)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->deleteCustomerProPosalVersionByID($id, $proposal_id, $request,$Vid);
    }
    public function destroy(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->deleteCustomerProPosalByID($id, $proposal_id, $request);
    }
    public function duplicate(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->duplicateCustomerProPosalByID($id, $proposal_id, $request);
    }

    public function duplicateVersion(Request $request, $enquiry_id, $proposal_id) {
        return  $this->customerEnquiryRepo->duplicateProposalVersion($enquiry_id, $proposal_id, $request);
    }

    public function versions(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->getCustomerProPosalVersions($id, $proposal_id, $request);
    }
    public function sendMail(Request $request, $id, $proposal_id)
    {
        $enquiry = Enquiry::find($id);
        $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'proposal_email_status');
        return  $enquiry    =   $this->customerEnquiryRepo->sendCustomerProPosalMail($id, $proposal_id, $request);
    }
    public function sendMailVersion(Request $request, $id, $proposal_id, $Vid)
    {
        $enquiry = Enquiry::find($id);
        $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'proposal_email_status');
        return  $enquiry    =   $this->customerEnquiryRepo->sendCustomerProPosalMailVersion($id, $proposal_id, $request, $Vid);
    } 

    public function sendProposal($id)
    {
        $rootVersion = MailTemplate::where(['enquiry_id'=> $id, 'proposal_status' => 'not_send'])->latest()->first();
        $childVersion = ProposalVersions::where(['enquiry_id'=> $id, 'proposal_status' => 'not_send'])->latest()->first();
        if(!$rootVersion && !$childVersion ) {
            return response(['status' => false, 'msg' => __('enquiry.generate_proposal')]);
        }
        $enquiry = Enquiry::find($id);
        if(!isset($childVersion->created_at)) {
            $result = $this->customerEnquiryRepo->sendCustomerProPosalMail($id, $rootVersion->proposal_id, null);
        }else if(!isset($rootVersion->updated_at)) {
            $result = $this->customerEnquiryRepo->sendCustomerProPosalMailVersion($id, $childVersion->proposal_id, null, $childVersion->id);
        }else if($rootVersion->updated_at > $childVersion->updated_at) {
            $result = $this->customerEnquiryRepo->sendCustomerProPosalMail($id, $rootVersion->proposal_id, null);
        } else {
            $result = $this->customerEnquiryRepo->sendCustomerProPosalMailVersion($id, $childVersion->proposal_id, null, $childVersion->id);
        }
        $this->customerEnquiryRepo->updateAdminWizardStatus($enquiry, 'proposal_email_status');
        return $result;
    }

    public function approve(Request $request, $id, $proposal_id, $Vid)
    { 
       
        return  $enquiry    =   $this->customerEnquiryRepo->aprovalProPosalMail($id, $proposal_id, $Vid, $request); 
    }
    public function customerApproval(Request $request, $id, $type)
    {
        $enquiry_id  = $id;
        $proposal_id = Crypt::decryptString($request->input('pid'));
        $version_id  = Crypt::decryptString($request->input('vid'));
        $comment    = $request->input('comment');
        $enquiry     = Enquiry::find($enquiry_id);
        if($type == 'change_request' || $type == 'deny') {
            $enquiry->project_status = "Unattended";
            $enquiry->customer_response = GlobalService::getProposalStatusValue($type);
            $enquiry->proposal_sharing_status = 0;
            $enquiry->save();
            $other = [
                'proposal_id' => $proposal_id,
                'version_id'  => $version_id,
                'comment'     => $comment
            ];
            $this->addComment($enquiry_id, $other, $type);
            return response(['status' => true, 'msg' => ($type == 'deny' ? __('enquiry.denied') : __('enquiry.change_request') )]);
        } 
        if($type == 'approve'){ 
            $enquiry->project_status = "Active";
            $enquiry->customer_response = GlobalService::getProposalStatusValue($type);
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

    public function addComment($enquiry_id, $other, $type)
    {
        $proposal_id = $other['proposal_id'];
        $version_id  = $other['version_id'];
        $comment     = $other['comment'];
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

    public function getDeniedProposal($id)
    {
        $proposals =  MailTemplate::with('getVersions')
                        ->where('enquiry_id', $id)
                        ->whereNotNull('comment')
                        ->orderBy('updated_at','desc')
                        ->get();
        $result = [];
        foreach($proposals as $key => $proposal){
            $verkey =1; $childVersion = [];
            if($proposal->getVersions()->exists()) {
                foreach($proposal->getVersions as $childkey => $proposalVersion){
                    $verkey += 1;
                    $childVersion[$childkey]=  ['template_name'=> "R{$verkey}", 'comment' => $proposalVersion->comment ];
                }
            }
            $result[$key] = ['template_name'=> $proposal->template_name, 'comment' => $proposal->comment, 'child' =>  $childVersion];
        }
        return  $result;
    }

    public function getApprovedProposal($id)
    {
        $proposals =  MailTemplate::with('getVersions')
                        ->where('enquiry_id', $id)
                        ->whereNull('comment')
                        ->orderBy('updated_at','desc')
                        ->get();
        $result = []; 
        foreach($proposals as $key => $proposal){
            $verkey =1; $childVersion = [];
            if($proposal->proposal_status == 'denied'){
                $result[] = ['template_name'=> $proposal->template_name, 'version' => 'R1' , 'comment' => $proposal->comment];
            }
           
            if($proposal->getVersions()->exists()) {
                foreach($proposal->getVersions as $childkey => $proposalVersion){
                    if($proposalVersion->proposal_status == 'denied'){
                        $verkey += 1;
                        $result[]=  ['template_name'=> $proposal->template_name, 'version' => "R{$verkey}",  'comment' => $proposalVersion->comment ];
                    }
                }
            }
        }
        return  $result;
    }

    public function moveToProject($id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($id);
        $enquiry->proposal_sharing_status = 1;
        $enquiry->project_status = 'Active';
        $enquiry->created_by = Admin()->id;
        return $enquiry->save();
    }
}