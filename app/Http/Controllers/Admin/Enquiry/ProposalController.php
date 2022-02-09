<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MailTemplate;
use App\Interfaces\CustomerEnquiryRepositoryInterface;


class ProposalController extends Controller
{
    protected $customerEnquiryRepo;
    protected $documentTypeEnquiryRepo;

    public function __construct(CustomerEnquiryRepositoryInterface $customerEnquiryRepository){
        $this->customerEnquiryRepo  = $customerEnquiryRepository;
    }

    public function index(Request $request, $id) {
        return  $enquiry    =   $this->customerEnquiryRepo->getCustomerProPosal($id);
    }

    public function edit(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->getCustomerProPosalByID($id, $proposal_id);
    }
    public function update(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->updateCustomerProPosalByID($id, $proposal_id, $request);
    }
    public function destroy(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->deleteCustomerProPosalByID($id, $proposal_id, $request);
    }
    public function duplicate(Request $request, $id, $proposal_id)
    {
        return  $enquiry    =   $this->customerEnquiryRepo->duplicateCustomerProPosalByID($id, $proposal_id, $request);
    }
}