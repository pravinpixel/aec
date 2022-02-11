<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MailTemplate;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Enquiry;
use Illuminate\Http\Response;
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
        return  $enquiry    =   $this->customerEnquiryRepo->sendCustomerProPosalMailVersion($id, $proposal_id, $request , $Vid);
    } 
    public function approve(Request $request, $id, $proposal_id, $Vid)
    { 
        return  $enquiry    =   $this->customerEnquiryRepo->aprovalProPosalMail($id, $proposal_id, $Vid, $request); 
    }
    public function customerApproval(Request $request, $id, $type=null)
    {
        if($type == 0) {
            $enquiry = Enquiry::find($id);
            $enquiry->customer_response = 2;
            $enquiry->save(); 
            Flash::success('Proposal successfully Dined!');
            return redirect()->route('customers.login');
        } 
        if($type == 1){
            
            $enquiry = Enquiry::find($id);
            $enquiry->customer_response = 1;
            $enquiry->save();
            Flash::success('Proposal successfully approved!');
            return redirect()->route('customers.login');
        }
    }
}