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
        $this->customerEnquiryRepo->updateProjectById($id, 'Active');
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
        if($type == 0) {
            $enquiry->project_status = "Unattended";
            $enquiry->customer_response = 2;
            $enquiry->save(); 
            $this->addComment($id, $request);
            Flash::success('Proposal successfully Dined!');
            return redirect()->route('customers.login');
        } 
        if($type == 1){ 
            $enquiry->project_status = "Active";
            $enquiry->customer_response = 1;
            $enquiry->save();
            $proposal_id    =   Crypt::decryptString($request->input('pid'));
            $proposal           =   MailTemplate::where('enquiry_id', $id)->whereNotIn('proposal_id', [$proposal_id])
                                                    ->update(['is_active' => 0]);
            $proposal_version   =   PropoalVersions::where('enquiry_id', $id)->whereNotIn('proposal_id', [$proposal_id])
                                                    ->update(['is_active' => 0]);                        
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
        $first =  MailTemplate::where('enquiry_id', $id)
                        ->whereNotNull('comment')
                        ->orderBy('updated_at','desc')
                        ->select('template_name', 'status', 'comment','parent_id');

        $second = PropoalVersions::where('enquiry_id', $id)
                                ->whereNotNull('comment')
                                ->orderBy('updated_at','desc')
                                ->select('template_name', 'status', 'comment', 'parent_id')
                                ->union( $first )
                                ->get();
        return $second;
    }
}