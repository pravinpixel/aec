<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerEnquiryRepository;
use App\View\Components\enquiryQuickView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HelperController extends Controller
{
    public function __construct(CustomerEnquiryRepository $customerEnquiryRepository){
        $this->customerEnquiryRepo  = $customerEnquiryRepository;
    }
    public function enquiry_quick_view(Request $request)
    {
        $enquiry =  new enquiryQuickView($request->enquiry_id, $request->preview_table ,$request->chat_box ?? 1);
        return $enquiry->render();
    }
    public function proposal_quick_view($id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        $latestVersion           =  App::make("App\Http\Controllers\Customer\ProposalController")->getLatestProposal($id);
        $data['proposals']       =  $this->customerEnquiryRepo->getCustomerProPosal($id);
        $data['enquiry_id']      =  $latestVersion->enquiry_id;
        $data['proposal_id']     =  $latestVersion->proposal_id;
        $data['version_id']      =  isset($latestVersion->parent_id) ? $latestVersion->id : 0;
        $data['latest_proposal'] =  $latestVersion;
        // dd($data['proposals'] );
        return view('customer.proposal.view',with($data),compact('id','enquiry'));
    }
}