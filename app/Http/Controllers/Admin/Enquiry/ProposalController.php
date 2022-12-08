<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MailTemplate;
use App\Models\Admin\PropoalVersions as ProposalVersions;
use App\Models\Documentary\Documentary;
use App\Models\Enquiry;
use App\Repositories\CustomerEnquiryRepository;
use App\Services\GlobalService;
use Barryvdh\DomPDF\Facade as PDF;
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
    public function download(Request $request, $id, $proposal_id){
        $contract=MailTemplate::where("enquiry_id", '=', $id)->where("proposal_id", '=', $proposal_id)->first();
        $template_name=$contract->template_name;
        $aec_logo='<img width="150px" style="margin-left:217px" src="data:image/png;base64,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" alt="AEC PREFAB LOGO" />';
        // $dompdf   = new Dompdf();
        // $dompdf->loadHtml('<h1>hello world</h1>');
        // $dompdf->loadHtml('<div>'.$contract->documentary_content.'</div>');
        // $dompdf->setPaper('A4');
        // $dompdf->render();
        // $dompdf->stream();
        $pdf = Pdf::loadView('pdf.proposal',array('data'=>$contract->documentary_content,'template_name'=>$template_name,'aec_logo'=>$aec_logo))->setPaper('A4');
        return $pdf->download('proposal.pdf');
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
        $enquiry->is_new_enquiry = 1;
        $enquiry->proposal_sharing_status = 1;
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
