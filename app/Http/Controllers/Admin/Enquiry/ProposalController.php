<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MailTemplate;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Mail\ProposalVersions;
use App\Models\Admin\PropoalVersions;
use App\Models\Enquiry;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Laracasts\Flash\Flash;

class ProposalController extends Controller
{
    protected $customerEnquiryRepo;
    protected $documentTypeEnquiryRepo;

    public function __construct(CustomerEnquiryRepositoryInterface $customerEnquiryRepository){
        $this->customerEnquiryRepo  = $customerEnquiryRepository;
    }
    public function index(Request $request, $id) 
    {
        return  $enquiry    =   $this->customerEnquiryRepo->getCustomerProPosal($id);
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
    public function versions(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->getCustomerProPosalVersions($id, $proposal_id, $request);
    }
    public function sendMail(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->sendCustomerProPosalMail($id, $proposal_id, $request);
    }
    public function sendMailVersion(Request $request, $id, $proposal_id, $Vid)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->sendCustomerProPosalMailVersion($id, $proposal_id, $request, $Vid);
    } 
    public function approve(Request $request, $id, $proposal_id, $Vid)
    { 
       
        return  $enquiry    =   $this->customerEnquiryRepo->aprovalProPosalMail($id, $proposal_id, $Vid, $request); 
    }
    public function customerApproval(Request $request, $id, $type)
    {
        $enquiry = Enquiry::find($id);
        if($enquiry->project_status != 'Unattended') {
            Flash::info('Proposal already approved!');
            return redirect()->route('customers.login');
        }
        $proposal_id    =   Crypt::decryptString($request->input('pid'));
        if($type == 0) {
            $enquiry->project_status = "Unattended";
            $enquiry->customer_response = 2;
            $enquiry->save(); 
            $this->addComment($id, $request);
            $proposal           =   MailTemplate::where(['enquiry_id'=> $id, 'proposal_id'=> $proposal_id])
                                                    ->update(['proposal_status' => 'denied']);
                                            
            $proposal_version   =   PropoalVersions::where(['enquiry_id'=> $id, 'proposal_id'=> $proposal_id])
                                                    ->update(['proposal_status' => 'denied']);    
            Flash::success('Proposal successfully Dined!');
            return redirect()->route('customers.login');
        } 
        if($type == 1){ 
            $enquiry->project_status = "Active";
            $enquiry->customer_response = 1;
            $enquiry->save();
          
            $proposal           =   MailTemplate::where(['enquiry_id'=> $id, 'proposal_id'=> $proposal_id])
                                                    ->update(['proposal_status' => 'approved']);
                                            
            $proposal_version   =   PropoalVersions::where(['enquiry_id'=> $id, 'proposal_id'=> $proposal_id])
                                                    ->update(['proposal_status' => 'approved']);    
                                                    
            $proposal           =   MailTemplate::where('enquiry_id', $id)->whereNotIn('proposal_id', [$proposal_id])
                                                    ->update(['proposal_status' => 'obsolete']);
            $proposal_version   =   PropoalVersions::where('enquiry_id', $id)->whereNotIn('proposal_id', [$proposal_id])
                                                    ->update(['proposal_status' => 'obsolete']);                        
            Flash::success('Proposal successfully approved!');
            return redirect()->route('customers.login');
        }
    }

    public function addComment($enquiry_id, $request)
    {
        $proposal_id    =   Crypt::decryptString($request->input('pid'));
        $version_id     =   Crypt::decryptString($request->input('vid'));
        $comment        =   $request->input('proposal_comments');
        if($version_id == 0) {
            $proposal = MailTemplate::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id])->first();
            $proposal->comment = $comment;
            $proposal->save();
        } else {
            $proposalVersio = PropoalVersions::where(['enquiry_id'=> $enquiry_id, 'proposal_id'=> $proposal_id, 'version_id'=>  $version_id])->first();
            $proposalVersio->comment = $comment;
            $proposalVersio->save();
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

    public function moveToProject($id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiryByID($id);
        $enquiry->proposal_sharing_status = 1;
        $enquiry->project_status = 'Active';
        $enquiry->created_by = Admin()->id;
        return $enquiry->save();
    }
}